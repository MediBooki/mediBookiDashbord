@extends('layouts.app')
@section('title','update | Setting')
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

                                <li class="breadcrumb-item active">{{ trans('main-sidebar.settings') }}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{ trans('main-sidebar.settings') }}</h4>
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
                                        <form class="form" action="{{route('settings.update','test')}}"
                                              method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-body">
                                                <input type="hidden" name="id" value="{{ $setting->id }}">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('setting.email') }}</label>
                                                            <input type="email" value="{{$setting->email}}" id="email"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="email">
                                                            @error("email")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('setting.linkedin') }} (optional)</label>
                                                            <input type="text" value="{{$setting->linkedin}}" id="email"
                                                                    class="form-control"
                                                                    placeholder=" "
                                                                    name="linkedin">
                                                            @error("linkedin")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('setting.gmail') }} (optional)</label>
                                                            <input type="text" value="{{$setting->gmail}}" id="gmail"
                                                                    class="form-control"
                                                                    placeholder=" "
                                                                    name="gmail">
                                                            @error("gmail")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('setting.twitter') }} (optional)</label>
                                                            <input type="text" value="{{$setting->twitter}}" id=""
                                                                class="form-control"
                                                                placeholder="  "
                                                                name="twitter">
                                                            @error("twitter")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('setting.instagram') }} (optional)</label>
                                                            <input type="text" value="{{$setting->instagram}}" id=""
                                                                class="form-control"
                                                                placeholder="  "
                                                                name="instagram">
                                                            @error("instagram")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('setting.youtube') }} (optional)</label>
                                                            <input type="text" value="{{$setting->youtube}}" id=""
                                                                class="form-control"
                                                                placeholder="  "
                                                                name="youtube">
                                                            @error("youtube")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('setting.whatsapp') }} (optional)</label>
                                                            <input type="text" value="{{$setting->whatsapp}}" id=""
                                                                class="form-control"
                                                                placeholder="  "
                                                                name="whatsapp">
                                                            @error("whatsapp")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('setting.snapchat') }} (optional)</label>
                                                            <input type="text" value="{{$setting->snapchat}}" id=""
                                                                class="form-control"
                                                                placeholder="  "
                                                                name="snapchat">
                                                            @error("snapchat")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('setting.facebook') }} (optional)</label>
                                                            <input type="text" value="{{$setting->facebook}}" id=""
                                                                class="form-control"
                                                                placeholder="  "
                                                                name="facebook">
                                                            @error("facebook")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('setting.phone') }} (optional)</label>
                                                            <input type="number" value="{{$setting->phone}}" id=""
                                                                class="form-control"
                                                                placeholder="  "
                                                                name="phone">
                                                            @error("phone")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('setting.whatsapp_phone') }} (optional)</label>
                                                            <input type="number" value="{{$setting->whatsapp_phone}}" id=""
                                                                class="form-control"
                                                                placeholder="  "
                                                                name="whatsapp_phone">
                                                            @error("whatsapp_phone")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{ trans('main-sidebar.Update') }}
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

@endsection