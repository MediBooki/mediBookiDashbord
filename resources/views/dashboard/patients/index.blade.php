@extends('layouts.app')
@section('title','page | patients')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('main-sidebar.patient') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('main-sidebar.patient') }}
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
                                <h4 class="card-title">All {{ trans('main-sidebar.patient') }}</h4>
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
                                    <a href="{{ route('patients.create') }}" class="btn btn-primary">{{ trans('patient.Add') }}</a>
                                    <a href="{{ route('patient.excel') }}" class="btn btn-success ml-2">Excel</a>
                                </div>
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table id="example" class="table display nowrap table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>##</th>
                                                <th>{{ trans('patient.name') }}</th>
                                                <th>{{ trans('patient.email') }}</th>
                                                <th>{{ trans('patient.date_of_birth') }}</th>
                                                <th>{{ trans('patient.phone') }}</th>
                                                <th>{{ trans('patient.gender') }}</th>
                                                <th>{{ trans('patient.blood_group') }}</th>
                                                <th>{{ trans('patient.address') }}</th>
                                                <th>{{ trans('patient.insurance_status') }}</th>
                                                <th>{{ trans('main-sidebar.Control')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($patients)
                                                @foreach($patients as $patient)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td><a href="{{route('patients.show', $patient->id)}}">{{ $patient->name }}</a></td>
                                                        <td>{{$patient->email }}</td>
                                                        <td>{{$patient->date_of_birth}}</td>
                                                        <td>{{$patient->phone}}</td>
                                                        <td>{{$patient->gender}}</td>
                                                        <td>{{$patient->blood_group}}</td>
                                                        <td>{{\Str::limit($patient->address,60)}}</td>
                                                        <td>
                                                            <span class="badge badge-pill badge-{{$patient->insurance_status == 1 ? 'success':'danger'}}">
                                                                {{ $patient->insurance_status == 1 ? trans('doctor.enabled') :  trans('doctor.disabled')}}
                                                            </span>
                                                        </td>
                                                        <td>                                                          
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                    {{ trans('main-sidebar.Control')}}
                                                                </button>
                                                                <div class="dropdown-menu" style="right: -50%;">
                                                                    @if($patient->insurance)
                                                                        <a class="dropdown-item" data-target="#edit{{ $patient->id }}"data-toggle="modal"><i class="text-success la la-edit"></i>{{ trans('main-sidebar.Update') }}</a>                                                                    
                                                                    @endif
                                                                    <a class="dropdown-item" data-target="#delete{{ $patient->id }}"data-toggle="modal" ><i class="text-danger la la-trash"></i>{{ trans('main-sidebar.Delete')}}</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @include('dashboard.patients.edit')
                                                    @include('dashboard.patients.delete')
                                                    @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                                {{ $patients->links() }}
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