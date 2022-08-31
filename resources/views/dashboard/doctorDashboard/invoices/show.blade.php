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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All {{ trans('main-sidebar.patient_history') }}</h4>
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>    
@endsection