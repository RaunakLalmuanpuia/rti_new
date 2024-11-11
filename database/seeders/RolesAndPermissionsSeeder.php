<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permissions
        $permissions = [
            'submit rti',
            'answer rti',
            'comment rti',
            'submit first appeal',
            'submit second appeal',
            'answer first appeal',
            'answer second appeal',
            'submit complain',
            'answer complain',
            'view users',
            'edit users',
            'delete users',
            'delete rti',
            'edit rti',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Define roles and their permissions
        $roles = [
            'Admin' => ['view users', 'edit users', 'delete users', 'delete rti','edit rti'],
            'Citizen' => [ 'submit rti',  'submit first appeal',  'submit second appeal', 'submit complain'],
            'Spio' => [ 'answer rti'],
            'Aspio' => ['comment rti'],
            'DAA' => ['answer first appeal'],
            'CIC' => ['answer second appeal','answer complain'],
        ];

        // Create roles and assign permissions
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }
    }
}
