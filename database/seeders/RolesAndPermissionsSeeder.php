<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create roles
        $SuperAdminRole = Role::create(['name' => 'SuperAdmin']);
        $ItRole = Role::create(['name' => 'It']);
        $HrRole = Role::create(['name' => 'Hr']);
        $LineManagerRole = Role::create(['name' => 'LineManager']);
        $AdminOfficerRole = Role::create(['name' => 'AdminOfficer']);
        $FinanceRole = Role::create(['name' => 'Finance']);
        $UserRole = Role::create(['name' => 'User']);


        //create permissions
        $ItOnboardUserPermission = Permission::create(['name' => 'It Onboard User']);
        $HrOnboardUserPermission = Permission::create(['name' => 'Hr Onboard User']);
        


        //assign permissions to roles
        $ItRole->givePermissionTo($ItOnboardUserPermission);
        $HrRole->givePermissionTo($HrOnboardUserPermission);
    }
}
