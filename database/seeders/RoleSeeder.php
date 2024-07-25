<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['employee', 'finance', 'director'];
        foreach ($roles as $key => $value) {
            $data = ['name' => $value];
            Permission::firstOrCreate($data);
            $role = Role::firstOrCreate($data);
            $role->syncPermissions($value);
        }
    }
}
