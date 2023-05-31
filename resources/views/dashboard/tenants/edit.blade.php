@extends('layouts.app')
@section('title','Edit | tenants')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.index') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('tenants.index')}}"> {{ trans('main-sidebar.tenant') }} </a>
                                </li>
                                <li class="breadcrumb-item active">  {{ trans('tenant.Edit') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> {{ trans('tenant.Edit') }} </h4>
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
                                    <div class="card-body">
                                        <form class="form"
                                            action="{{ route('tenants.update','test') }}"
                                            method="POST" 
                                            enctype="multipart/form-data">
                                            {{ method_field('patch') }}
                                            @csrf
                                            <div class="row m-1">
                                                <label>logo</label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" accept="image/*" name="logo" onchange="loadFile(event)">
                                                    <img src="{{$tenant->getFirstMediaUrl('logo')}}" width="150px" height="150px" id="output" />
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <input type="hidden" name="id" value="{{$tenant->id}}" />
                                            <input type="hidden" name="old_database" value="{{$tenant->database}}" />

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{ trans('tenant.Edit') }} </h4>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('tenant.name') }}</label>
                                                            <input type="text" id="name"
                                                                class="form-control"
                                                                placeholder="egypt"
                                                                value="{{$tenant->name}}"
                                                                name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('tenant.domain') }}</label>
                                                            <input type="text" id="domain"
                                                                class="form-control"
                                                                placeholder="egypt.mediBookiDashbord.test"
                                                                value="{{$tenant->domain}}"
                                                                name="domain">
                                                            @error("domain")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('tenant.database_name') }}</label>
                                                            <input type="text" id="database_name"
                                                                class="form-control"
                                                                placeholder="mediabookie_egypt"
                                                                value="{{$tenant->database}}"
                                                                name="database">
                                                            @error("database")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{ trans('main-sidebar.Back') }}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{ trans('main-sidebar.Submit') }}
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@stop