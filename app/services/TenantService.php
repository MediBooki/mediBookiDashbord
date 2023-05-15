<?php

namespace App\services;

use App\Models\Tenant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TenantService
{
    
    private $tenant;
    private $domain;
    private $database;


    public function switchToTenant(Tenant  $tenant)
    {
       if($tenant instanceof Tenant) {
        DB::purge('landlord');
        DB::purge('tenant');
        Config::set('database.connections.tenant.database',$tenant->database);
        $this->tenant = $tenant;
        $this->domain = $tenant->domain;
        $this->database = $tenant->database;
        DB::reconnect('tenant')->reconnect();
        DB::setDefaultConnection('tenant');
    } else {
        throw ValidationException::withMessages(['field_name'=>'This Value is incorrect']);
    }
        // dd($tenant->database);
    }

    public function switchToDefault()
    {
        DB::purge('landlord'); //remove cache in sql 
        DB::purge('tenant');
        DB::reconnect('landlord')->reconnect();
        DB::setDefaultConnection('landlord');
    }

    public function getTenant(){
        return $this->tenant;
    }
}