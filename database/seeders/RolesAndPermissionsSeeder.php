<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        Permission::create(['name' => 'add post']);
        Permission::create(['name' => 'edit post']);
        Permission::create(['name' => 'delete post']);
        Permission::create(['name' => 'publish post']);
        Permission::create(['name' => 'unpublish post']);

        Permission::create(['name' => 'add competition']);
        Permission::create(['name' => 'edit competition']);
        Permission::create(['name' => 'delete competition']);

        Permission::create(['name' => 'add school']);
        Permission::create(['name' => 'edit school']);
        Permission::create(['name' => 'delete school']);

        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'send notification']);
        Permission::create(['name' => 'add notification']);

        Permission::create(['name' => 'add event']);
        Permission::create(['name' => 'edit event']);
        Permission::create(['name' => 'delete event']);

        Permission::create(['name' => 'vote']);
        Permission::create(['name' => 'assign role']);
        Permission::create(['name' => 'verify user']);


        // create roles and assign created permissions

        // this can be done as separate statements
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo(Permission::all());

        // [
        //     'add post',
        //     'edit post',
        //     'delete post',
        //     'publish post',
        //     'unpublish post',
        //     'add competition',
        //     'edit competition',
        //     'delete competition',
        //     'add school',
        //     'edit school',
        //     'delete school',
        //     'send notification',
        //     'add notification',
        //     'add event',
        //     'edit event',
        //     'delete event',
        //     'assign role',
        //     'add user',
        //     'edit user',
        //     'delete user'
        // ]

        $roleGeneralAmbassador = Role::create(['name' => 'general-ambassador'])->givePermissionTo([
            'vote',
            'edit user'
        ]);

        $roleWashAmbassador = Role::create(['name' => 'wash-ambassodor'])->givePermissionTo([
            'vote',
            'edit user'
        ]);

        $roleTeacher = Role::create(['name' => 'teacher']);
        $roleWard = Role::create(['name' => 'ward' ]);

        // or may be done by chaining
        $role = Role::create(['name' => 'moderator'])
        ->givePermissionTo(['publish articles', 'unpublish articles']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
