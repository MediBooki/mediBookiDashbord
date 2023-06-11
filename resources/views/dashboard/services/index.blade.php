@extends('layouts.app')
@section('title','page | services')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('main-sidebar.services') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('main-sidebar.services') }}
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
                                <h4 class="card-title">All {{ trans('main-sidebar.services') }}</h4>
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
                                {{-- <div class="row m-1">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#heading1AddServices"  >{{ trans('service.Add') }}</a>
                                </div> --}}
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table id="example" class="table display nowrap table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>##</th>
                                                <th>{{ trans('service.name') }}</th>
                                                <th>{{ trans('doctor.name') }}</th>
                                                <th>{{ trans('service.price') }}</th>
                                                <th>{{ trans('service.status') }}</th>
                                                {{-- <th>{{ trans('service.photo') }}</th> --}}
                                                <th>{{ trans('service.description') }}</th>
                                                {{-- <th>{{ trans('main-sidebar.Control')}}</th> --}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($services)
                                                @foreach($services as $service)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$service->name}}</td>
                                                        <td>{{$service->doctor->name}}</td>
                                                        <td>{{$service->price}}</td>
                                                        <td>
                                                            <span class="badge badge-pill badge-{{$service->status == 1 ? 'success':'danger'}}">
                                                                {{ $service->status == 1 ? trans('doctor.enabled') :  trans('doctor.disabled')}}
                                                            </span>
                                                        </td>
                                                        {{-- <td><img style="width: 150px; height: 100px;" src="{{$service->getFirstMediaUrl('photo')}}"></td> --}}
                                                        <td>{{\Str::limit($service->description,60)}}</td>
                                                        {{-- <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                    {{ trans('main-sidebar.Control')}}
                                                                </button>
                                                                <div class="dropdown-menu" style="right: -50%;">
                                                                    <a class="dropdown-item" data-target="#edit{{ $service->id }}"data-toggle="modal" ><i class="text-success la la-edit"></i>{{ trans('main-sidebar.Update') }}</a>
                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#delete{{ $service->id }}" ><i class="text-danger la la-trash"></i>{{ trans('main-sidebar.Delete')}}</a>
                                                                </div>
                                                            </div>
                                                        </td> --}}
                                                    </tr>
                                                    {{-- @include('dashboard.services.single.edit')
                                                    @include('dashboard.services.single.delete') --}}
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                                {{ $services->links() }}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @include('dashboard.services.single.create') --}}
                </div>
            </section>
        </div>
    </div>
</div>    
@endsection