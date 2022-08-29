@extends('layouts.app')
@section('title','Add | invoices')
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
                                <li class="breadcrumb-item"><a href="{{route('invoices.index')}}"> {{ trans('main-sidebar.invoice') }} </a>
                                </li>
                                <li class="breadcrumb-item active">  {{ trans('invoice.Add') }}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{ trans('invoice.Add') }} </h4>
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
                                                action="{{ route('invoices.store') }}"
                                                method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{ trans('invoice.Add') }} </h4>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('patient.name') }}</label>
                                                            <select name="patient_id" class="select2 form-control">
                                                                <optgroup label="{{ trans('main-sidebar.patient') }}">
                                                                    @if($patients && $patients -> count() > 0)
                                                                        @foreach($patients as $patient)
                                                                            <option
                                                                                value="{{$patient->id }}">{{$patient -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error("patient_id")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('main-sidebar.doctors') }}</label>
                                                            <select name="doctor_id" class="select2 form-control" onchange="console.log($(this).val())">
                                                                <optgroup label="{{ trans('main-sidebar.doctors') }}">
                                                                    @if($doctors && $doctors -> count() > 0)
                                                                        @foreach($doctors as $doctor)
                                                                            <option
                                                                                value="{{$doctor->id }}">{{$doctor->name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error("doctor_id")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('main-sidebar.sections') }}</label>
                                                            <select name="section_id" class="select2 form-control">

                                                            </select>
                                                            @error("section_id")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('invoice.type') }}</label>
                                                            <select name="type" class="select2 form-control">
                                                                <optgroup label="{{ trans('invoice.type') }}">
                                                                <option value="1">نقدي</option>
                                                                <option value="2">اجل</option>
                                                                </optgroup>
                                                            </select>
                                                            @error("type")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('main-sidebar.services') }}</label>
                                                            <select name="service_id" class="select2 form-control">
                                                                <optgroup label="{{ trans('main-sidebar.services') }}">
                                                                    @if($services && $services -> count() > 0)
                                                                        @foreach($services as $service)
                                                                            <option
                                                                                value="{{$service->id }}">{{$service->name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error("service_id")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('service.price') }}</label>
                                                            <input type="text" id="price"
                                                                class="form-control"
                                                                placeholder="  "
                                                                value="{{old('price')}}"
                                                                name="price" readonly>
                                                            @error("price")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('invoice.discount_value') }}</label>
                                                            <input type="text" id="discount_value"
                                                                class="form-control"
                                                                placeholder="  "
                                                                value="{{old('discount_value')}}"
                                                                name="discount_value">
                                                            @error("discount_value")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('invoice.tax_rate') }}</label>
                                                            <input type="text" id="tax_rate"
                                                                class="form-control"
                                                                placeholder="  "
                                                                value="{{old('tax_rate')}}"
                                                                name="tax_rate">
                                                            @error("tax_rate")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('invoice.tax_value') }}</label>
                                                            <input type="text" id="tax_value"
                                                                class="form-control"
                                                                placeholder="  "
                                                                value="{{old('tax_value')}}"
                                                                name="tax_value" readonly>
                                                            @error("tax_value")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('invoice.total_with_tax') }}</label>
                                                            <input type="text" id="total_with_tax"
                                                                class="form-control"
                                                                placeholder="  "
                                                                value="{{old('total_with_tax')}}"
                                                                name="total_with_tax" readonly>
                                                            @error("total_with_tax")
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
    $(document).ready(function () {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $('select[name="doctor_id"]').on('change', function () {
            var doctor_id = $(this).val();
            if (doctor_id) {
                $.get('sections/doctors/' + doctor_id, function (data) {
                    $('select[name="section_id"]').append('<option value="' + data.section_id + '">' + data.section_name + '</option>');
                })
            } else {
                console.log('AJAX load did not work');
            }
        });
        $('select[name="service_id"]').on('change', function () {
            var service_id = $(this).val();
            if (service_id) {
                $.get('service/price/' + service_id, function (data) {
                    $('input[name="price"]').val(data.price);
                })
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<script>
    var totalprice= 0
    document.getElementById('discount_value').addEventListener('blur', function(){
        let price = document.getElementById('price').value;
        let discount_value = document.getElementById('discount_value').value;
        totalprice = price - discount_value
        document.getElementById('total_with_tax').value = totalprice;
    });

    document.getElementById('tax_rate').addEventListener('blur', function(){
        let tax_rate = document.getElementById('tax_rate').value;
        let tax_value = (tax_rate/100) * totalprice;
        document.getElementById('tax_value').value = tax_value;
        totalprice = totalprice + tax_value;
        document.getElementById('total_with_tax').value = totalprice;
    });
</script>

@endsection