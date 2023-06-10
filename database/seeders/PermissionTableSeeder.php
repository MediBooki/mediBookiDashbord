<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'sections',
            'doctors',
            'patients',
            'services',
            'insurances',
            'invoices',
            'accounts',
            'x-ray',
            'laboratory',
            'medicine',
            'bookLists',
            'users',
            'blogs',
            'sliders',
            'settings',
            'terms',
            'orders',
            'tenants'

    ];
    
    
    
    foreach ($permissions as $permission) {
        Permission::create(['name' => $permission]);
    }
    
    }
}
