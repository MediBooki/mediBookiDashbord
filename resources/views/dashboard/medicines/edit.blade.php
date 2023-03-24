@extends('layouts.app')
@section('title','Edit | medicines')
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
                                <li class="breadcrumb-item"><a href="{{route('medicines.index')}}"> {{ trans('main-sidebar.medicines') }} </a>
                                </li>
                                <li class="breadcrumb-item active">  {{ trans('medicine.Edit') }}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{ trans('medicine.Edit') }} </h4>
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
                                            action="{{ route('medicines.update','test') }}"
                                            method="POST"
                                            enctype="multipart/form-data">
                                            {{ method_field('patch') }}
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $medicine->id }}" />
                                            <div class="form-group">
                                                <label> {{ trans('medicine.photo') }} </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" accept="image/*" name="photo" onchange="loadFile(event)">
                                                    <img style="..." width="150px" height="150px" id="output" src="{{$medicine->getFirstMediaUrl('photo')}}" />
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{ trans('medicine.Edit') }} </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('medicine.medicine_name_ar') }}</label>
                                                            <input type="text" id="name"
                                                                class="form-control"
                                                                placeholder="  "
                                                                value="{{$medicine->getTranslation('name', 'ar') }}"
                                                                name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('medicine.medicine_name_en') }}</label>
                                                            <input type="text" id="name"
                                                                class="form-control"
                                                                placeholder="  "
                                                                value="{{$medicine->getTranslation('name', 'en')}}"
                                                                name="name_en">
                                                            @error("name_en")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('medicine.price') }}</label>
                                                            <input type="number" id="name"
                                                                class="form-control"
                                                                placeholder="  "
                                                                value="{{ $medicine->price }}"
                                                                name="price">
                                                            @error("price")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('medicine.manufactured_by') }} </label>
                                                            <input type="text" id="name"
                                                                class="form-control"
                                                                placeholder="  "
                                                                value="{{ $medicine->manufactured_by}}"
                                                                name="manufactured_by">
                                                            @error("manufactured_by")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('section.section') }}
                                                            </label>
                                                            <select name="category_id" class="select2 form-control">
                                                                <optgroup label="{{ trans('section.section') }}">
                                                                    @if($categories && $categories -> count() > 0)
                                                                        @foreach($categories as $category)
                                                                            <option value="{{$category->id }}" class="{{$category->id == $medicine->category_id ? 'selected' : ''}}">{{$category->name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('category_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('medicine.medicine_description_ar') }}
                                                            </label>
                                                            <textarea  name="description" id="description" class="form-control">{{$medicine->getTranslation('description', 'ar')}}</textarea>
                                                            @error("description")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('medicine.medicine_description_en') }}
                                                            </label>
                                                            <textarea  name="description_en" id="description" class="form-control">{{$medicine->getTranslation('description', 'en')}}</textarea>
                                                            @error("description_en")
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