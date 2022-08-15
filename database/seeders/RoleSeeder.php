<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role01['name'] = 'super_admin';
        $role01['display_name'] = 'website manager';
        Role::create($role01);

        $role02['name'] = 'owner';
        $role02['display_name'] = 'jobs manager';
        Role::create($role02);

        $role03['name'] = 'client';
        $role03['display_name'] = 'website client';
        Role::create($role03);
    }
}
