@extends('layouts.app')
@section('title','update | orders')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('main-sidebar.index')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('Dash_orders.index')}}"> {{ trans('main-sidebar.orders') }} </a></li>
                                </li>
                                <li class="breadcrumb-item active"> update - {{$order->first_name}}
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
                                    <h4 class="card-title" id="basic-layout-form"> Edit {{ trans('main-sidebar.orders') }} </h4>
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
                                              action="{{route('Dash_orders.update',$order -> id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                              {{ method_field('patch') }}
                                            @csrf
                                            <input name="id" value="{{$order -> id}}" type="hidden">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{ trans('main-sidebar.orders') }}</h4>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('order.first_name') }}
                                                                 </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$order->first_name}}"
                                                                   name="first_name">
                                                            @error("first_name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('order.last_name') }}
                                                                 </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$order->last_name}}"
                                                                   name="last_name">
                                                            @error("last_name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('patient.email') }}
                                                                 </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$order->email}}"
                                                                   name="email">
                                                            @error("email")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('order.phone1') }}</label>
                                                            <input type="number" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$order->phone1}}"
                                                                   name="phone1">
                                                            @error("phone1")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('order.phone2') }}
                                                                 </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$order->phone2}}"
                                                                   name="phone2">
                                                            @error("phone2")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('order.zip_code') }}
                                                                 </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$order->zip_code}}"
                                                                   name="zip_code">
                                                            @error("zip_code")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('order.total') }}</label>
                                                            <input type="number" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$order->total}}"
                                                                   name="total">
                                                            @error("total")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('order.state') }}
                                                                 </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$order->state}}"
                                                                   name="state">
                                                            @error("state")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('order.city') }}
                                                                 </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$order->city}}"
                                                                   name="city">
                                                            @error("city")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('order.address1') }}</label>
                                                            <input type="text" id="name"
                                                                class="form-control"
                                                                placeholder="  "
                                                                value="{{$order->address1}}"
                                                                name="address1">
                                                            @error("address1")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{ trans('order.address2') }}</label>
                                                            <input type="text" id="name"
                                                                class="form-control"
                                                                placeholder="  "
                                                                value="{{$order->address2}}"
                                                                name="address2">
                                                            @error("address2")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ trans('order.shipping') }}
                                                            </label>
                                                            <select name="shipping_status" class="select2 form-control">
                                                                <optgroup label="{{ trans('order.shipping') }}">
                                                                    <option value="1" {{ $order->shipping_status == 1 ? ' selected' : '' }}>{{ trans('order.delivered') }}</option>
                                                                    <option value="2" {{ $order->shipping_status == 2 ? ' selected' : '' }}>{{ trans('order.undelivered') }}</option>
                                                                    <option value="0" {{ $order->shipping_status == 0 ? ' selected' : '' }}>{{ trans('order.preparation')}}</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('shipping_status')
                                                            <span class="text-danger"> {{$message}}</span>
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
                                                    <i class="la la-check-square-o"></i> {{ trans('main-sidebar.Update')}}
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