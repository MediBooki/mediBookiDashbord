@extends('layouts.app')
@section('name','Update | Roles')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.index') }} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('roles.index')}}"> {{ trans('main-sidebar.roles') }}</a></li>
                                </li>
                                <li class="breadcrumb-item active"> {{ trans('role.update') }} - {{$role -> name}}
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
                                    <h4 class="card-title" id="basic-layout-form">  {{ trans('main-sidebar.Update')}} {{ trans('main-sidebar.roles') }} </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
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
                                              action="{{route('roles.update',$role->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                              {{ method_field('patch') }}
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $role->id }}">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{ trans('main-sidebar.roles') }}</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('role.role_name') }}
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{ $role->name }}"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                            <div class="row">
                                                                @foreach($permission as $value)
                                                                    <div class="form-group col-sm-4">
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" class="chk-box" name="permission[]" value="{{ $value->id }}"  {{ in_array($value->id, $rolePermissions)? 'checked' : '' }}>    {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            @error('permission.0')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{ trans('main-sidebar.Back') }}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>  {{ trans('main-sidebar.Update')}}
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