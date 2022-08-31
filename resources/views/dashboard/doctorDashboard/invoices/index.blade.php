@extends('layouts.app')
@section('title','page | invoices')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('main-sidebar.invoice') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.doctor')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('main-sidebar.invoice') }}
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
                                <h4 class="card-title">All {{ trans('main-sidebar.invoice') }}</h4>
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
                                <div class="row m-1">
                                    <a href="{{ route('invoices.create') }}" class="btn btn-primary">{{ trans('invoice.Add') }}</a>
                                </div>
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table id="example" class="table display nowrap table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>##</th>
                                                <th>{{ trans('service.name') }}</th>
                                                <th>{{ trans('patient.name') }}</th>
                                                <th>{{ trans('invoice.invoice_date') }}</th>
                                                <th>{{ trans('service.name') }}</th>
                                                <th>{{ trans('service.price') }}</th>
                                                <th>{{ trans('invoice.discount_value') }}</th>
                                                <th>{{ trans('invoice.tax_rate') }}</th>
                                                <th>{{ trans('invoice.tax_value') }}</th>
                                                <th>{{ trans('invoice.total_with_tax') }}</th>
                                                <th>{{ trans('invoice.type') }}</th>
                                                <th>{{ trans('main-sidebar.Control')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($invoices)
                                                @foreach($invoices as $invoice)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$invoice->service->name}}</td>
                                                        <td>{{$invoice->patient->name }}</td>
                                                        <td>{{$invoice->invoice_date}}</td>
                                                        <td>{{$invoice->service->name}}</td>
                                                        <td>{{$invoice->service->price}}</td>
                                                        <td>{{$invoice->discount_value}}</td>
                                                        <td>{{$invoice->tax_rate}}</td>
                                                        <td>{{$invoice->tax_value}}</td>
                                                        <td>{{$invoice->total_with_tax}}</td>
                                                        <td>{{$invoice->status == 1 ?  'تحت المراجعة' : $invoice->status == 2 ? : 'مراجعة'  : 'مكتملة'}}</td>
                                                        <td>
                                                            {{-- <div class="btn-group">
                                                                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                    {{ trans('main-sidebar.Control')}}
                                                                </button>
                                                                <div class="dropdown-menu" style="right: -50%;">
                                                                    <a class="dropdown-item" href="{{ route('invoices.edit',$invoice->id) }}"><i class="text-success la la-edit"></i>{{ trans('main-sidebar.Update') }}</a>           
                                                                    <a class="dropdown-item" href="{{ route('invoices.show',$invoice->id) }}" target="_blank"><i class="text-warning la la-print"></i>{{ trans('main-sidebar.Print') }}</a>                                                         
                                                                    <a class="dropdown-item" data-target="#delete{{ $invoice->id }}"data-toggle="modal" ><i class="text-danger la la-trash"></i>{{ trans('main-sidebar.Delete')}}</a>
                                                                </div>
                                                              </div> --}}
                                                        </td>
                                                    </tr>
                                                    @include('dashboard.invoices.delete')
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                                {{ $invoices->links() }}
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