<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::orderBy('id','DESC')->get();
        return view('dashboard.tenants.index', compact('tenants'));
    }
    public function edit($id)
    {
        $tenant = Tenant::findOrfail($id);
        return view('dashboard.tenants.edit', compact('tenant'));

    }
    public function create()
    {
        return view('dashboard.tenants.create');
    }
    public function store(Request $request)
    {
        
        $tenants = new Tenant();
        $tenants->name = $request->name;
        $tenants->domain = $request->domain;
        $tenants->database = $request->database;
        $tenants->save();
        DB::statement("CREATE DATABASE $tenants->database");
        Artisan::call('database:migrate');
            return redirect()->route('tenants.index')->with('success','Tenant created successfully');
      
    }
    public function update(Request $request)
    {
        $tenants = Tenant::findOrfail($request->id);
        $tenants->name = $request->name;
        $tenants->domain = $request->domain;
        $tenants->database = $request->database;
        $tenants->save();
        // DB::statement("CREATE DATABASE $tenants->database");
        DB::statement("ALTER DATABASE $request->old_database RENAME TO $tenants->database");
        // Artisan::call('database:migrate');
        return redirect()->route('tenants.index')->with('success','tenant updated successfully');

    }
}
