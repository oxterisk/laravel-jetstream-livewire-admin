<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Module;

class Modules extends Component
{
    use WithPagination;

    public $active = true;
    public $queryParams;

    public $sortBy = 'name';
    public $sortAsc = true;

    public $module;

    public $showModalModuleForm = false;
    public $showModalModuleDestroy = false;

    protected $rules = [
        'module.name' => 'required|string|min:2|max:255',
        'module.description' => 'nullable',
        'module.active' => 'boolean',
    ];

    public function mount() {

        $this->validationAttributes = [
            'module.name' => __('Name'),
            'module.description' => __('Description'),
        ];

    }

    public function render() {

        $modules = Module::when( $this->queryParams, function( $query ) {
            return $query->where( function( $query ) {
                $query->where( 'name', 'like', '%' . $this->queryParams . '%' );
            });
        })
        ->when( $this->active, function( $query ) {
            return $query->active();
        })->orderBy( $this->sortBy, $this->sortAsc ? 'ASC' : 'DESC' );
        $modules = $modules->paginate(10);

        return view( 'modules.component',[
            'modules' => $modules,
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

    public function modalModuleForm() {

        $this->reset(['module']);
        $this->module['active'] = true;
        $this->showModalModuleForm = true;

    }

    public function storeModule() {

        $this->validate();

        if ( isset( $this->module->id ) ) {

            $this->module->save();
            $this->dispatchBrowserEvent( 'alert', ['type' => 'success',  'message' => __('Data updated')] );

        } else {

            Module::create([
                'name' => $this->module['name'],
                'description' => $this->module['description'] ?? null,
                'active' => $this->module['active'] ?? 0,
            ]);
            $this->dispatchBrowserEvent( 'alert', ['type' => 'success',  'message' => __('Data saved')] );

        }

        $this->showModalModuleForm = false;

    }

    public function modalModuleEdit( Module $module ) {

        $this->module = $module;
        $this->showModalModuleForm = true;

    }

    public function modalModuleDestroy( Module $module ) {

        $this->module = $module;
        $this->showModalModuleDestroy = $module->id;

    }

    public function destroyModule( Module $module ) {

        $module->delete();
        $this->reset(['module']);

        $this->dispatchBrowserEvent( 'alert', ['type' => 'success',  'message' => __('Data deleted')] );

        $this->showModalModuleDestroy = false;

    }
}