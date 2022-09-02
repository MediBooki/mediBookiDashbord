@extends('layouts.app')
@section('title','page | patient history')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('main-sidebar.patient_history') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.doctor')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('main-sidebar.patient_history') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <!-- Trade History & Place Order -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">patient Informatios</h4>
                            </div>
                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="nav nav-tabs nav-underline no-hover-bg">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="base-limit" data-toggle="tab" aria-controls="limit"
                                            href="#limit" aria-expanded="true">patient profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="base-market" data-toggle="tab" aria-controls="market" href="#market"
                                            aria-expanded="false">الاشعة</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="base-stop-limit" data-toggle="tab" aria-controls="stop-limit"
                                            href="#stop-limit" aria-expanded="false">المختبر</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content px-1 pt-1">
                                        <div role="tabpanel" class="tab-pane active" id="limit" aria-expanded="true" aria-labelledby="base-limit">
                                            <section id="timeline" class="timeline-center timeline-wrapper">
                                                <h3 class="page-title text-center">Timeline</h3>
                                                
                                                <!-- 2016 -->
                                                {{-- <ul class="timeline">
                                                    <li class="timeline-line"></li>
                                                    <li class="timeline-group">
                                                    <a href="#" class="btn btn-primary"><i class="la la-calendar-o"></i> 2016</a>
                                                    </li>
                                                </ul> --}}
                                                <ul class="timeline">
                                                    <li class="timeline-line"></li>
                                                    <!-- /.timeline-line -->
                                                    @isset($patient_records)
                                                        @foreach ($patient_records as $patient_record)
                                                        <li class="timeline-item mt-3">
                                                            <div class="timeline-badge">
                                                            <span class="bg-teal bg-lighten-1" data-toggle="tooltip" data-placement="right"
                                                            title="Nullam facilisis fermentum"><i class="la la la-check-square-o"></i></span>
                                                            </div>
                                                            <div class="timeline-card card border-grey border-lighten-2">
                                                                <div class="card-header">
                                                                    <h4 class="card-title"><a href="#">{{ $patient_record->doctor->name }}</a></h4>
                                                                    <p class="card-subtitle text-muted mb-0 pt-1">
                                                                    <span class="font-small-3">{{ $patient_record->date }}</span>
                                                                    </p>
                                                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                                                    <div class="heading-elements">
                                                                    <ul class="list-inline mb-0">
                                                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                                    </ul>
                                                                    </div>
                                                                </div>
                                                            <div class="card-content">
                                                                <div class="card-content">
                                                                    <div class="card-body">
                                                                        <p class="card-text">{{ $patient_record->diagnosis }}.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    @endisset
                                                </ul>
                                            </section>
                                        </div>
                                        <div class="tab-pane" id="market" aria-labelledby="base-market">
                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table id="example" class="table display nowrap table-striped table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>##</th>
                                                            <th>{{ trans('service.name') }}</th>
                                                            <th>{{ trans('doctor.name') }}</th>
                                                            <th>{{ trans('main-sidebar.Control')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @isset($patient_rays)
                                                            @foreach($patient_rays as $patient_ray)
                                                                <tr>
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>{{$patient_ray->description}}</td>
                                                                    <td>{{$patient_ray->doctor->name}}</td>
                                                                    <td>
                                                                        @if ($patient_ray->doctor_id == auth()->user()->id)
                                                                            <div class="btn-group" role="group"
                                                                                aria-label="Basic example">
                                                                                <button class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#edit{{ $patient_ray->id }}">{{ trans('main-sidebar.Update')}}</button>
                                                                                <button type="button" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#delete{{ $patient_ray->id }}" >{{ trans('main-sidebar.Delete')}}</button>
                                                                            </div>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                @include('dashboard.doctorDashboard.rays.edit')
                                                                @include('dashboard.doctorDashboard.rays.delete')
                                                            @endforeach
                                                        @endisset
                                                        </tbody>

                                                    </table>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="stop-limit" aria-labelledby="base-stop-limit">
                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table class="table display nowrap table-striped table-bordered">
                                                        <thead class="">
                                                        <tr>
                                                            <th>##</th>
                                                            <th>{{ trans('patient.name') }}</th>
                                                            <th>{{ trans('receipt.depit') }}</th>
                                                            <th>{{ trans('receipt.description') }}</th>
                                                            <th>{{ trans('receipt.date')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @isset($receipts)
                                                            @foreach($receipts as $receipt)
                                                                <tr>
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td> {{$receipt->patient->name}}</a></td>
                                                                    <td>{{number_format($receipt->debit,2)}}</td>
                                                                    <td>{{\Str::limit($receipt->description,60)}}</td>
                                                                    <td>{{$receipt->date}}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endisset
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
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