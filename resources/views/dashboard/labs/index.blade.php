@extends('layouts.app')
@section('title','page | Labs')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('main-sidebar.labs') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('main-sidebar.labs') }}
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
                                <h4 class="card-title">All {{ trans('main-sidebar.labs') }}</h4>
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
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table id="example" class="table display nowrap table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>##</th>
                                                <th>{{ trans('service.name') }}</th>
                                                <th>{{ trans('doctor.name') }}</th>
                                                <th>{{ trans('patient.name') }}</th>
                                                <th>اسم موظف التحاليل</th>
                                                <th>حالة الكشف</th>
                                                <th>تاريخ الانشاء</th>
                                                <th>{{ trans('main-sidebar.Control')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($patient_labs)
                                                @foreach($patient_labs as $patient_lab)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$patient_lab->description}}</td>
                                                        <td>{{$patient_lab->doctor->name}}</td>
                                                        <td>{{$patient_lab->patient->name}}</td>
                                                        <td>{{$patient_lab->user->name ?? 'لم يتم عمل التحاليل'}}</td>
                                                        <td><span class="badge badge-pill badge-danger">غير مكتمل</span></td>
                                                        <td>{{$patient_lab->created_at->format('m/d/Y')}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <button class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#edit{{ $patient_lab->id }}">{{ trans('main-sidebar.Update')}}</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @include('dashboard.labs.edit')
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                                {{ $patient_labs->links() }}
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