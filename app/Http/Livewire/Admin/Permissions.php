<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    use WithPagination;

    public $queryParams;

    public $sortBy = 'name';
    public $sortAsc = true;

    public $permission;
    public $select_guards;

    public $showModalPermissionForm = false;
    public $showModalPermissionDestroy = false;

    protected $rules = [
        'permission.name' => 'required|unique:permissions,name',
        'permission.guard_name' => 'nullable',
    ];

    public function mount() {

        $this->validationAttributes = [
            'permission.name' => __('Name'),
            'permission.guard_name' => __('Guard'),
        ];

    }

    public function render() {

        $permissions = Permission::when( $this->queryParams, function( $query ) {
            $query->where( 'name', 'like', '%' . $this->queryParams . '%' )
                ->orWhere( 'guard_name', 'like', '%' . $this->queryParams . '%' );
        } )
        ->orderBy( $this->sortBy, $this->sortAsc ? 'ASC' : 'DESC' )
        ->paginate(10);

        return view( 'admin.permissions.component', [
            'permissions' => $permissions,
        ] );

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

    public function modalPermissionForm() {

        $this->select_guards = array_keys( config( 'auth.guards' ) );
        $this->showModalPermissionForm = true;
        $this->reset(['permission']);

    }

    public function modalPermissionEdit( Permission $permission ) {

        $this->select_guards = array_keys( config( 'auth.guards' ) );
        $this->permission = $permission;
        $this->showModalPermissionForm = true;

    }

    public function storePermission() {

        if ( isset( $this->permission->id ) ) {

            $validations['permission.name'] = 'required|unique:permissions,name,' . $this->permission->id;
            $validatedData = $this->validate( $validations );

            $this->permission->save();
            $this->dispatchBrowserEvent( 'alert', ['type' => 'success',  'message' => __('Data updated')] );

        } else {

            $this->validate();

            Permission::create([
                'name' => $this->permission['name'],
                'guard_name' => $this->permission['guard_name'] ?? null,
            ]);

            $this->dispatchBrowserEvent( 'alert', ['type' => 'success',  'message' => __('Data saved')] );

        }

        $this->showModalPermissionForm = false;

    }

    public function modalPermissionDestroy( Permission $permission ) {

        $this->permission = $permission;
        $this->showModalPermissionDestroy = $permission->id;

    }

    public function destroyPermission( Permission $permission ) {

        $permission->delete();
        $this->dispatchBrowserEvent( 'alert', ['type' => 'success',  'message' => __('Data deleted')] );

        $this->showModalPermissionDestroy = false;
        $this->reset(['permission']);

    }

}