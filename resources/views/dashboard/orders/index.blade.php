@extends('layouts.app')
@section('title','page | orders')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('main-sidebar.orders') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('main-sidebar.orders') }}
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
                                <h4 class="card-title">All {{ trans('main-sidebar.orders') }}</h4>
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
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table display nowrap table-striped table-bordered">
                                            <thead class="">
                                            <tr>
                                                <th>{{ trans('patient.name') }}</th>
                                                <th>{{ trans('patient.email') }}</th>
                                                <th>{{ trans('patient.phone') }}</th>
                                                <th>{{ trans('order.shipping') }}</th>
                                                <th>{{ trans('order.city') }}</th>
                                                <th>{{ trans('order.zip_code') }}</th>
                                                <th>{{ trans('order.total') }}</th>
                                                <th>{{ trans('main-sidebar.Control')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($orders)
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{$order->first_name}}</td>
                                                        <td>{{$order ->email}}</td>
                                                        <td>{{$order ->phone1}}</td>
                                                        <td>{{$order->shipping_status == 0  ? trans('order.preparation') : ($order->shipping_status == 1 ? trans('order.delivered') : trans('order.undelivered')) }}</td>
                                                        <td>{{$order ->city}}</td>
                                                        <td>{{$order ->zip_code}}</td>
                                                        <td>{{$order ->total}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <a href="{{route('Dash_orders.show',$order->id)}}"
                                                                    class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">{{ trans('main-sidebar.show')}}</a>
                                                                 <a href="{{route('Dash_orders.edit',$order->id)}}"
                                                                class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{ trans('main-sidebar.Update')}}</a>
                                                                <button type="button" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#delete{{ $order->id }}" >{{ trans('main-sidebar.Delete')}}</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @include('dashboard.orders.delete')
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                                {{ $orders->links() }}
                                            </ul>
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