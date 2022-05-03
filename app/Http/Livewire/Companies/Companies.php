<?php

namespace App\Http\Livewire\Companies;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\Company;
use App\Models\Module;

class Companies extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $active = true;
    public $queryParams;

    public $sortBy = 'name';
    public $sortAsc = true;

    public $company;
    public $companyLogo;
    public $removeLogo = false;

    public $modules;
    public $companyModules = array();

    public $showModalCompanyForm = false;
    public $showModalCompanyDestroy = false;
    public $showModalModules = false;

    private $folderLogos = 'companies/logos';

    protected $rules = [
        'company.name' => 'required|string|min:3|max:255',
        'company.phone' => 'nullable|string|max:100',
        'company.email' => 'nullable|string|email|max:255',
        'company.address' => 'nullable|string|max:255',
        'company.city' => 'nullable|string|max:255',
        'company.country' => 'nullable|string|max:255',
        'company.comments' => 'nullable',
        'company.active' => 'boolean',
        'companyLogo' => 'image|mimes:jpg,jpeg,png,gif|max:2048|nullable',
    ];

    public function render() {

        $companies = Company::when( $this->queryParams, function( $query ) {
            return $query->where( function( $query ) {
                $query->where( 'name', 'like', '%' . $this->queryParams . '%' )
                    ->orWhere( 'phone', 'like', '%' . $this->queryParams . '%' )
                    ->orWhere( 'email', 'like', '%' . $this->queryParams . '%' )
                    ->orWhere( 'city', 'like', '%' . $this->queryParams . '%' )
                    ->orWhere( 'country', 'like', '%' . $this->queryParams . '%' );
            });
        })
        ->when( $this->active, function( $query ) {
            return $query->active();
        })->orderBy( $this->sortBy, $this->sortAsc ? 'ASC' : 'DESC' );
        $companies = $companies->paginate(10);

        return view( 'companies.manage-companies',[
            'companies' => $companies,
        ]);

    }

    /**
     * Reset page when update query
     */
    public function updatingActive() {
        $this->resetPage();
    }

    public function updatingQueryParams() {
        $this->resetPage();
    }

    public function sortBy( $field ) {

        if ( $field == $this->sortBy ) {
            $this->sortAsc = !$this->sortAsc;
        }

        $this->sortBy = $field;

    }

    public function modalCompanyForm() {

        $this->reset(['company', 'companyLogo', 'removeLogo']);
        $this->showModalCompanyForm = true;

    }

    public function storeCompany() {

        $this->validate();

        if ( isset( $this->companyLogo ) && $this->companyLogo != '' && !$this->removeLogo ) {

            if ( isset( $this->company->id ) && $this->company->logo != '' )
                $this->removeLogo( $this->company->logo );

            $this->company->logo = Carbon::now()->timestamp . '.' . $this->companyLogo->extension();
            $this->companyLogo->storeAs( $this->folderLogos, $this->company['logo'], 'public' );

        }

        if ( isset( $this->company->id ) ) {

            if ( $this->removeLogo && $this->company->logo != '' ) {

                $this->removeLogo( $this->company->logo );
                $this->company->logo = null;

            }

            $this->company->save();
            session()->flash( 'flash.banner', __('Data updated') );
            session()->flash( 'flash.bannerStyle', 'success' );

        } else {

            Company::create([
                'name' => $this->company['name'],
                'phone' => $this->company['phone'] ?? null,
                'email' => $this->company['email'] ?? null,
                'address' => $this->company['address'] ?? null,
                'city' => $this->company['city'] ?? null,
                'country' => $this->company['country'] ?? null,
                'comments' => $this->company['comments'] ?? null,
                'active' => $this->company['active'] ?? 0,
                'logo' => $this->company['logo'] ?? null,
            ]);
            session()->flash( 'flash.banner', __('Data saved') );
            session()->flash( 'flash.bannerStyle', 'success');

        }

        $this->showModalCompanyForm = false;

    }

    public function modalCompanyEdit( Company $company ) {

        $this->reset(['companyLogo', 'removeLogo']);
        $this->company = $company;
        $this->showModalCompanyForm = true;

    }

    public function modalCompanyDestroy( Company $company ) {

        $this->company = $company;
        $this->showModalCompanyDestroy = $company->id;

    }

    public function destroyCompany( Company $company ) {

        $this->removeLogo( $company->logo );

        $company->delete();
        $this->reset(['company']);

        session()->flash( 'flash.banner', __('Data deleted') );
        session()->flash( 'flash.bannerStyle', 'success');

        $this->showModalCompanyDestroy = false;

    }

    public function modalModules( Company $company ) {

        $this->reset(['companyModules']);

        $this->company = $company;
        $this->modules = Module::all();
        $this->companyModules = $company->modules->pluck( 'id' )->toArray();

        $this->showModalModules = $company->id;

    }

    public function storeModules( Company $company ) {

        $company->modules()->sync( $this->companyModules );

        session()->flash( 'flash.banner', __('Data updated') );
        session()->flash( 'flash.bannerStyle', 'success' );

        $this->showModalModules = false;
        $this->reset(['companyModules']);

    }

    private function removeLogo( $filename = '' ) {

        if ( $filename != '' )
            Storage::disk( 'public' )->delete( $this->folderLogos . '/' . $filename );
    }
}
