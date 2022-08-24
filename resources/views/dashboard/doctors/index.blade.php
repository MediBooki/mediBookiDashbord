@extends('layouts.app')
@section('title','page | Doctors')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('main-sidebar.doctors') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('main-sidebar.doctors') }}
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
                                <h4 class="card-title">All {{ trans('main-sidebar.doctors') }}</h4>
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
                                    <a href="{{ route('doctors.create') }}" class="btn btn-primary">{{ trans('doctor.Add') }}</a>
                                    <button type="button" class="btn btn-danger mx-1" id="btn_delete_all">{{ trans('doctor.delete_select') }}</button>
                                </div>
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table id="example" class="table display nowrap table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>##</th>
                                                <th><input type="checkbox" name="select_all" id="exampleCheck1"></th>
                                                <th>{{ trans('doctor.name') }}</th>
                                                <th>{{ trans('doctor.photo') }}</th>
                                                <th>{{ trans('doctor.email') }}</th>
                                                <th>{{ trans('section.section') }}</th>
                                                <th>{{ trans('doctor.phone') }}</th>
                                                <th>{{ trans('doctor.appointments') }}</th>
                                                <th>{{ trans('doctor.status') }}</th>
                                                <th>{{ trans('main-sidebar.Control')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($doctors)
                                                @foreach($doctors as $doctor)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td><input type="checkbox" name="delete_select" value="{{ $doctor->id }}"></td>
                                                        <td>{{$doctor->name}}</td>
                                                        <td><img style="width: 150px; height: 100px;" src="{{$doctor->getFirstMediaUrl('photo')}}"></td>
                                                        <td>{{$doctor->email}}</td>
                                                        <td>{{$doctor->section->name}}</td>
                                                        <td>{{$doctor->phone}}</td>
                                                        <td> 
                                                            @foreach ($doctor->appointments as $appointment)
                                                                <li>{{ $appointment->name }}</li>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-pill badge-{{$doctor->status == 1 ? 'success':'danger'}}">
                                                                {{ $doctor->status == 1 ? trans('doctor.enabled') :  trans('doctor.disabled')}}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            {{-- <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <button class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#edit{{ $doctor->id }}">{{ trans('main-sidebar.Update')}}</button>
                                                                <button type="button" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#delete{{ $doctor->id }}" >{{ trans('main-sidebar.Delete')}}</button>
                                                            </div> --}}
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                  Action
                                                                </button>
                                                                <div class="dropdown-menu" style="right: -50%;">
                                                                    <a class="dropdown-item" data-target="#edit{{ $doctor->id }}"data-toggle="modal" ><i class="text-success la la-user"></i>{{ trans('doctor.update_status') }}</a>
                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#delete{{ $doctor->id }}" ><i class="text-danger la la-trash"></i>{{ trans('main-sidebar.Delete')}}</a>
                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    @include('dashboard.doctors.delete')
                                                    @include('dashboard.doctors.delete_select')
                                                    @include('dashboard.doctors.edit')
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                                {{ $doctors->links() }}
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
@section('script')
    <script>
        $(function() {
            jQuery("[name=select_all]").click(function(source){
                checkboxes = jQuery("[name=delete_select]");
                for(var i in checkboxes) {
                    checkboxes[i].checked = source.target.checked;
                }
            });
        });
    </script>
    <script type="text/javascript">
            $(function() {
                $('#btn_delete_all').click(function () {
                    var selected = [];
                    $("#example input[name=delete_select]:checked").each(function () {
                        selected.push(this.value);
                    });
                    if(selected.length > 0 ) {
                        $('#delete_select').modal('show');
                        $('input[id="delete_select_id"]').val(selected)
                    }
                });
            });
    </script>
@endsection