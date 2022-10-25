@extends('layouts.app')
@section('title','page | Medicines / Drugs')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('main-sidebar.medicines') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('main-sidebar.medicines') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All {{ trans('main-sidebar.medicines') }}</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')
                            <div class="card-content collapse show">
                                <div class="row m-1">
                                    <a href="{{ route('medicines.create') }}" class="btn btn-primary">{{ trans('medicine.Add') }}</a>
                                </div>
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table id="example" class=" table display nowrap table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>##</th>
                                                <th>{{ trans('medicine.name') }}</th>
                                                <th>{{ trans('medicine.photo') }}</th>
                                                <th>{{ trans('medicine.price') }}</th>
                                                <th>{{ trans('section.section') }}</th>
                                                <th>{{ trans('medicine.description') }}</th>
                                                <th>{{ trans('doctor.status') }}</th>
                                                <th>{{ trans('main-sidebar.Control')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($medicines)
                                                @foreach($medicines as $medicine)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$medicine->name}}</td>
                                                        <td><img style="width: 150px; height: 100px;" src="{{$medicine->getFirstMediaUrl('photo')}}"></td>
                                                        <td>{{$medicine->price}}</td>
                                                        <td>{{$medicine->section->name}}</td>
                                                        <td>{{$medicine->description}}</td>
                                                        <td>
                                                            <span class="badge badge-pill badge-{{$medicine->status == 1 ? 'success':'danger'}}">
                                                                {{ $medicine->status == 1 ? trans('doctor.enabled') :  trans('doctor.disabled')}}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                    Action
                                                                </button>
                                                                <div class="dropdown-menu" style="right: -50%;">
                                                                    <a class="dropdown-item" href="{{ route('medicines.edit', $medicine->id) }}"><i class="text-success la la-edit"></i>{{ trans('main-sidebar.Update') }}</a>
                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#delete{{ $medicine->id }}" ><i class="text-danger la la-trash"></i>{{ trans('main-sidebar.Delete')}}</a>
                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    @include('dashboard.medicines.delete')
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                                            <ul class="pagination">
                                                {{ $medicines->links() }}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>    
@endsection