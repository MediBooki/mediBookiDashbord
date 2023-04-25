@extends('layouts.app')
@section('title','Add | Doctors')
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
                                <li class="breadcrumb-item"><a href="{{route('doctors.index')}}"> {{ trans('main-sidebar.doctors') }} </a>
                                </li>
                                <li class="breadcrumb-item active">  {{ trans('doctor.Add') }}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{ trans('doctor.Add') }} </h4>
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
                                              action="{{ route('doctors.store') }}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label> {{ trans('doctor.photo') }} </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" accept="image/*" name="photo" onchange="loadFile(event)">
                                                    <img style="..." width="150px" height="150px" id="output" />
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{ trans('doctor.Add') }} </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('doctor.doctor_name_ar') }}
                                                                 </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('name')}}"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('doctor.doctor_name_en') }}
                                                                 </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('name_en')}}"
                                                                   name="name_en">
                                                            @error("name_en")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('doctor.email') }}
                                                                 </label>
                                                            <input type="email" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('email')}}"
                                                                   name="email">
                                                            @error("email")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('doctor.password') }}
                                                                 </label>
                                                            <input type="password" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('password')}}"
                                                                   name="password">
                                                            @error("password")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('doctor.phone') }}
                                                                 </label>
                                                            <input type="number" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('phone')}}"
                                                                   name="phone">
                                                            @error("phone")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('bookList.price') }}
                                                                 </label>
                                                            <input type="number" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('price')}}"
                                                                   name="price">
                                                            @error("price")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('section.section') }}
                                                            </label>
                                                            <select name="section_id" class="select2 form-control">
                                                                <optgroup label="{{ trans('section.section') }}">
                                                                    @if($sections && $sections -> count() > 0)
                                                                        @foreach($sections as $section)
                                                                            <option
                                                                                value="{{$section->id }}">{{$section -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('section_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('doctor.appointments') }}
                                                            </label>
                                                            <select name="appointments[]" class="select2 form-control" multiple>
                                                                <optgroup label="{{ trans('doctor.appointments') }}">
                                                                    @if($appointments && $appointments -> count() > 0)
                                                                        @foreach($appointments as $appointment)
                                                                            <option
                                                                                value="{{$appointment->id }}">{{$appointment->name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('appointments')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('doctor.gender') }}</label>
                                                            <select name="gender" class="select2 form-control">
                                                                <optgroup label="{{ trans('doctor.gender') }}">
                                                                    <option value="0">{{ trans('doctor.male') }}</option>
                                                                    <option value="1">{{ trans('doctor.female') }}</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('gender')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('doctor.title') }}</label>
                                                            <select name="title" class="select2 form-control">
                                                                <optgroup label="{{ trans('doctor.title') }}">
                                                                    <option value="0">{{ trans('doctor.professor') }}</option>
                                                                    <option value="1">{{ trans('doctor.consultant') }}</option>
                                                                    <option value="2">{{ trans('doctor.specialist') }}</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('title')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('doctor.specialization') }}</label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('specialization')}}"
                                                                   name="specialization">
                                                            @error("specialization")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('bookList.start') }}
                                                                 </label>
                                                            <input type="time" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('start')}}"
                                                                   name="start">
                                                            @error("start")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('bookList.end') }}
                                                                 </label>
                                                            <input type="time" id="end"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('end')}}"
                                                                   name="end">
                                                            @error("end")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('bookList.patient_time_minute') }}</label>
                                                            <input type="number" id="end"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('patient_time_minute')}}"
                                                                   name="patient_time_minute">
                                                            @error("patient_time_minute")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('doctor.doctor_education_ar') }}
                                                            </label>
                                                            <textarea  name="education" id="education" class="form-control">{{old('education')}}</textarea>
                                                            @error("education")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('doctor.doctor_education_en') }}
                                                            </label>
                                                            <textarea  name="education_en" id="education" class="form-control">{{old('education_en')}}</textarea>
                                                            @error("education_en")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('doctor.doctor_experience_ar') }}
                                                            </label>
                                                            <textarea  name="experience" id="experience" class="form-control">{{old('experience')}}</textarea>
                                                            @error("experience")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('doctor.doctor_experience_en') }}
                                                            </label>
                                                            <textarea  name="experience_en" id="experience" class="form-control">{{old('experience_en')}}</textarea>
                                                            @error("experience_en")
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