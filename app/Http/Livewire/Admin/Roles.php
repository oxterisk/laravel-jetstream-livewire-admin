<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roles extends Component
{
    use WithPagination;

    public $queryParams;

    public $sortBy = 'name';
    public $sortAsc = true;

    public $role;

    public $permissions;
    public $rolePermissions = array();
    public $select_guards;

    public $showModalRoleForm = false;
    public $showModalRoleDestroy = false;
    public $showModalPermissions = false;

    protected $rules = [
        'role.name' => 'required|unique:roles,name',
        'role.guard_name' => 'nullable',
    ];

    public function mount() {

        $this->validationAttributes = [
            'role.name' => __('Name'),
            'role.guard_name' => __('Guard'),
        ];

    }

    public function render() {

        $roles = Role::when( $this->queryParams, function( $query ) {
            $query->where( 'name', 'like', '%' . $this->queryParams . '%' )
                ->orWhere( 'guard_name', 'like', '%' . $this->queryParams . '%' );
        } )
        ->orderBy( $this->sortBy, $this->sortAsc ? 'ASC' : 'DESC' )
        ->paginate(10);

        return view( 'admin.roles.component', [
            'roles' => $roles,
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

    public function modalRoleForm() {

        $this->select_guards = array_keys( config( 'auth.guards' ) );
        $this->showModalRoleForm = true;
        $this->reset(['role']);

    }

    public function modalRoleEdit( Role $role ) {

        $this->select_guards = array_keys( config( 'auth.guards' ) );
        $this->role = $role;
        $this->showModalRoleForm = true;

    }

    public function storeRole() {

        if ( isset( $this->role->id ) ) {

            $validations['role.name'] = 'required|unique:roles,name,' . $this->role->id;
            $validatedData = $this->validate( $validations );

            $this->role->save();
            $this->dispatchBrowserEvent( 'alert', ['type' => 'success',  'message' => __('Data updated')] );

        } else {

            $this->validate();

            Role::create([
                'name' => $this->role['name'],
                'guard_name' => $this->role['guard_name'] ?? null,
            ]);

            $this->dispatchBrowserEvent( 'alert', ['type' => 'success',  'message' => __('Data saved')] );

        }

        $this->showModalRoleForm = false;

    }

    public function modalRoleDestroy( Role $role ) {

        $this->role = $role;
        $this->showModalRoleDestroy = $role->id;

    }

    public function destroyRole( Role $role ) {

        $role->delete();
        $this->dispatchBrowserEvent( 'alert', ['type' => 'success',  'message' => __('Data deleted')] );

        $this->showModalRoleDestroy = false;
        $this->reset(['role']);

    }

    public function modalPermissions( Role $role ) {

        $this->reset(['rolePermissions']);

        $this->role = $role;
        $this->permissions = Permission::where( 'guard_name', $this->role['guard_name'] )->orderBy( 'name', 'ASC' )->get();
        $this->rolePermissions = $role->permissions->pluck( 'name' )->toArray();

        $this->showModalPermissions = $role->id;

    }

    public function storePermissions( Role $role ) {

        $role->syncPermissions( $this->rolePermissions );
        $this->dispatchBrowserEvent( 'alert', ['type' => 'success',  'message' => __('Data updated')] );

        $this->showModalPermissions = false;
        $this->reset(['rolePermissions']);

    }

}