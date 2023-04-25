@extends('layouts.app')
@section('title','Add | Silders')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.Dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('sliders.index')}}"> {{ trans('main-sidebar.sliders') }} </a>
                                </li>
                                <li class="breadcrumb-item active">  {{ trans('slider.Add') }}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{ trans('main-sidebar.sliders') }} </h4>
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
                                            action="{{ route('sliders.store') }}"
                                            method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label> {{ trans('slider.slider_upload') }} </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" accept="image/*" name="photo" onchange="loadFile(event)">
                                                    <img style="..." width="150px" height="150px" id="output" />
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{ trans('slider.Add') }} </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('slider.slider_title_ar') }}</label>
                                                            <input type="text" id="title"
                                                                class="form-control"
                                                                placeholder="  "
                                                                value="{{old('title')}}"
                                                                name="title">
                                                            @error("title")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('slider.slider_title_en') }}</label>
                                                            <input type="text" id="title"
                                                                class="form-control"
                                                                placeholder="  "
                                                                value="{{old('title_en')}}"
                                                                name="title_en">
                                                            @error("title_en")
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
    @section('script')
    <script>
        var loadFile = function(event){
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.load = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
@endsection