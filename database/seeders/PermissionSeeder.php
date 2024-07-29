<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
//event
            'event-categories-list',
            'event-categories-create',
            'event-categories-edit',
            'event-categories-delete',

            'event-list',
            'event-create',
            'event-edit',
            'event-delete',
//cms
            'header-list',
            'header-create',
            'header-edit',
            'header-delete',

            'footer-list',
            'footer-create',
            'footer-edit',
            'footer-delete',

            'menu-list',
            'menu-create',
            'menu-edit',
            'menu-delete',

            'pages-list',
            'pages-create',
            'pages-edit',
            'pages-delete',

//user
            'user-list',
            'user-create',
            'user-edit',
            'user-status-change',
            'user-delete',
//role
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
//staff
            'staff-list',
            'staff-create',
            'staff-edit',
            'staff-delete',
        ];
        foreach ($permissions as $permission) {
            $data=explode('-',$permission);
            $permission_data = Permission::where('name', $permission)->first();
            if(!$permission_data){
                $permission_data = new Permission;
            }
            $permission_data->name=$permission;
            $permission_data->parent_name=$data[0];
            $permission_data->guard_name = 'admin';
            $permission_data->save();
        }
    }
}
