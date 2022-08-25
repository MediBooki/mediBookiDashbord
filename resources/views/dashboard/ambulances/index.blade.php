@extends('layouts.app')
@section('title','page | Ambulances')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('main-sidebar.ambulance') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('main-sidebar.ambulance') }}
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
                                <h4 class="card-title">All {{ trans('main-sidebar.ambulance') }}</h4>
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
                                    <a href="{{ route('ambulances.create') }}" class="btn btn-primary">{{ trans('ambulance.Add') }}</a>
                                </div>
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table id="example" class="table display nowrap table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>##</th>
                                                <th>{{ trans('ambulance.car_number') }}</th>
                                                <th>{{ trans('ambulance.car_model') }}</th>
                                                <th>{{ trans('ambulance.car_year_made') }}</th>
                                                <th>{{ trans('ambulance.driver_name') }}</th>
                                                <th>{{ trans('ambulance.driver_license_number') }}</th>
                                                <th>{{ trans('ambulance.driver_phone') }}</th>
                                                <th>{{ trans('ambulance.status') }}</th>
                                                <th>{{ trans('main-sidebar.Control')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($ambulances)
                                                @foreach($ambulances as $ambulance)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$ambulance->car_number}}</td>
                                                        <td>{{$ambulance->car_model }}</td>
                                                        <td>{{$ambulance->car_year_made}}</td>
                                                        <td>{{$ambulance->driver_name}}</td>
                                                        <td>{{$ambulance->driver_license_number}}</td>
                                                        <td>{{$ambulance->driver_phone}}</td>
                                                        <td>
                                                            <span class="badge badge-pill badge-{{$ambulance->is_available == 1 ? 'success':'danger'}}">
                                                                {{ $ambulance->is_available == 1 ? trans('doctor.enabled') :  trans('doctor.disabled')}}
                                                            </span>
                                                        </td>
                                                        <td>
                                                          
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                    {{ trans('main-sidebar.Control')}}
                                                                </button>
                                                                <div class="dropdown-menu" style="right: -50%;">
                                                                    <a class="dropdown-item" data-target="#edit{{ $ambulance->id }}"data-toggle="modal"><i class="text-success la la-edit"></i>{{ trans('main-sidebar.Update') }}</a>                                                                    
                                                                    <a class="dropdown-item" data-target="#delete{{ $ambulance->id }}"data-toggle="modal" ><i class="text-danger la la-trash"></i>{{ trans('main-sidebar.Delete')}}</a>
                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    @include('dashboard.ambulances.edit')
                                                    @include('dashboard.ambulances.delete')
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                                {{ $ambulances->links() }}
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