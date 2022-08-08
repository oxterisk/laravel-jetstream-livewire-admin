<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Company;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithPagination;

    public $queryParams;
    public $active = true;
    public $admin;
    public $company_id;

    public $sortBy = 'name';
    public $sortAsc = true;

    public $user;

    public $roles;
    public $userRoles = array();

    public $companies;
    public $userCompanies = array();

    public $password;
    public $password_confirmation;

    public $showModalUserForm = false;
    public $showModalUserDestroy = false;
    public $showModalPasswordEdit = false;
    public $showModalRoles = false;
    public $showModalCompanies = false;

    protected $rules = [
        'user.name' => '',
        'user.last_name' => '',
        'user.phone' => '',
        'user.email' => '',
        'user.comments' => '',
        'user.active' => '',
        'user.is_admin' => '',
    ];

    public function mount() {

        $this->validationAttributes = [
            'user.name' => __('Name'),
            'user.last_name' => __('Last name'),
            'user.phone' => __('Phone'),
            'user.email' => __('Email'),
            'user.comments' => __('Comments'),
            'user.password' => __('Password'),
            'user.password_confirmation' => __('Confirm Password'),
            'password' => __('Password'),
            'password_confirmation' => __('Confirm Password'),
        ];

    }

    public function render() {

        $users = User::when( $this->company_id, function( $query ) {
            return $this->company_id == -1 ?
                $query->leftJoin( 'company_user', 'users.id', '=', 'company_user.user_id' )->whereNull( 'company_user.company_id'  ) :
                $query->leftJoin( 'company_user', 'users.id', '=', 'company_user.user_id' )->where( 'company_id', '=', $this->company_id  );

            })
            ->when( $this->queryParams, function( $query ) {
                return $query->where( function( $query ) {
                    $query->where( 'name', 'like', '%' . $this->queryParams . '%' )
                        ->orWhere( 'last_name', 'like', '%' . $this->queryParams . '%' )
                        ->orWhere( 'phone', 'like', '%' . $this->queryParams . '%' )
                        ->orWhere( 'email', 'like', '%' . $this->queryParams . '%' );
                });
            })
            ->when( $this->active, function( $query ) {
                return $query->active(); })
            ->when( $this->admin, function( $query ) {
                return $query->admin(); })
            ->orderBy( $this->sortBy, $this->sortAsc ? 'ASC' : 'DESC' )
            ->paginate(10);

        $companies = Company::orderBy( 'name' )->get();

        return view( 'admin.users.component', [
            'users' => $users,
            'select_companies' => $companies,
        ]);

    }

    public function updatingActive() {
        $this->resetPage();
    }

    public function updatingAdmin() {
        $this->resetPage();
    }

    public function updatingQueryParams() {
        $this->resetPage();
    }

    public function updatingCompanyId( $id ) {

        $this->company_id = $id == '' ? null : (int)$id;
        $this->resetPage();

    }

    public function sortBy( $field ) {

        if ( $field == $this->sortBy ) {
            $this->sortAsc = !$this->sortAsc;
        }

        $this->sortBy = $field;

    }

    public function modalUserForm() {

        $this->reset(['user']);
        $this->user['active'] = true;
        $this->showModalUserForm = true;

    }

    public function modalUserEdit( User $user ) {

        $this->user = $user;
        $this->showModalUserForm = true;

    }

    public function storeUser() {

        $validations = [
            'user.name' => 'required|string|min:2|max:255',
            'user.last_name' => 'nullable|string|max:255',
            'user.phone' => 'nullable|string|max:100',
            'user.comments' => 'nullable',
            'user.active' => '',
            'user.is_admin' => '',
        ];

        if ( isset( $this->user->id ) ) {

            $validations['user.email'] = 'required|email|max:255|unique:users,email,' . $this->user->id;
            unset($this->user['password']);
            $validatedData = $this->validate( $validations );

            $this->user->save();
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success',  'message' => __('Data updated')]);
            //session()->flash( 'flash.banner', __('Data updated') );
            //session()->flash( 'flash.bannerStyle', 'success' );

        } else {

            $validations['user.email'] = 'required|email|max:255|unique:users,email';
            $validations['user.password'] = 'required|min:8|max:255';
            $validations['user.password_confirmation'] = 'required_with:user.password|same:user.password|min:8|max:255';
            $validatedData = $this->validate( $validations );

            User::create([
                'name' => $this->user['name'],
                'last_name' => $this->user['last_name'] ?? null,
                'phone' => $this->user['phone'] ?? null,
                'email' => $this->user['email'] ?? null,
                'password' => Hash::make( $this->user['password'] ),
                'comments' => $this->user['comments'] ?? null,
                'active' => $this->user['active'] ?? 0,
                'is_admin' => $this->user['is_admin'] ?? 0,
            ]);
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success',  'message' => __('Data saved')]);
            //session()->flash( 'flash.banner', __('Data saved') );
            //session()->flash( 'flash.bannerStyle', 'success');

        }

        $this->showModalUserForm = false;

    }

    public function modalPasswordEdit( User $user ) {

        $this->user = $user;
        $this->showModalPasswordEdit = $user->id;

    }

    public function storePassword( User $user ) {

        $validatedData = $this->validate([
            'password' => 'required|min:8|max:255',
            'password_confirmation' => 'required_with:password|same:password|min:8|max:255',
        ]);

        $user->password = Hash::make( $this->password );
        $user->save();

        $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => __('Password updated')]);
        //session()->flash( 'flash.banner', __('Password updated') );
        //session()->flash( 'flash.bannerStyle', 'success' );

        $this->reset(['password']);
        $this->reset(['password_confirmation']);

        $this->showModalPasswordEdit = false;

    }

    public function modalUserDestroy( User $user ) {

        $this->user = $user;
        $this->showModalUserDestroy = $user->id;

    }

    public function destroyUser( User $user ) {

        $user->delete();

        $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => __('Data deleted')]);
        //session()->flash( 'flash.banner', __('Data deleted') );
        //session()->flash( 'flash.bannerStyle', 'success');

        $this->showModalUserDestroy = false;
        $this->reset(['user']);

    }

    public function modalRoles( User $user ) {

        $this->reset(['userRoles']);

        $this->user = $user;
        $this->roles = Role::all();
        $this->userRoles = $user->roles->pluck( 'name' )->toArray();

        $this->showModalRoles = $user->id;

    }

    public function storeRoles( User $user ) {

        $user->syncRoles( $this->userRoles );

        $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => __('Data updated')]);
        //session()->flash( 'flash.banner', __('Data updated') );
        //session()->flash( 'flash.bannerStyle', 'success' );

        $this->showModalRoles = false;
        $this->reset(['userRoles']);

    }

    public function modalCompanies( User $user) {

        $this->reset(['userCompanies']);

        $this->user = $user;
        $this->companies = Company::all();
        $this->userCompanies = $user->companies->pluck( 'id' )->toArray();

        $this->showModalCompanies = $user->id;

    }

    public function storeCompanies( User $user ) {

        $user->companies()->sync( $this->userCompanies );

        $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => __('Data updated')]);
        //session()->flash( 'flash.banner', __('Data updated') );
        //session()->flash( 'flash.bannerStyle', 'success' );

        $this->showModalCompanies = false;
        $this->reset(['userCompanies']);

    }
}
