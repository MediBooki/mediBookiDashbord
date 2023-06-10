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
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $tenants->addMediaFromRequest('logo')->toMediaCollection('logo');
        }
        // DB::statement("CREATE DATABASE $tenants->database");
        // Artisan::call('database:migrate');
        return redirect()->route('tenants.index')->with('success','Tenant created successfully');
      
    }
    public function update(Request $request)
    {
        $tenants = Tenant::findOrfail($request->id);
        $tenants->name = $request->name;
        $tenants->domain = $request->domain;
        // if( $request->old_database !== $request->database){
        //     DB::statement("ALTER DATABASE $request->old_database RENAME TO $request->database");
        //     $tenants->database = $request->database;
        // }
        $tenants->save();
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $tenants->clearMediaCollection('logo');
            $tenants->addMediaFromRequest('logo')->toMediaCollection('logo');
        }
        return redirect()->route('tenants.index')->with('success','tenant updated successfully');
    }
    public function destroy(Request $request)
    {
        $tenant = Tenant::findOrFail($request->id);
        // DB::statement("DROP DATABASE  $tenant->database");
        $tenant->delete();
        $tenant->clearMediaCollection('photo');
        return redirect()->route('tenants.index')->with(['success' => 'tenant Deleted Successfully']);
    }

}
