@extends('layouts.app')
@section('title','page | patients')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('main-sidebar.patient') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('main-sidebar.patient') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <!-- Trade History & Place Order -->
                <div class="row">
                
                    <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <h4 class="card-title">patient Informatios</h4>
                        </div>
                        <div class="card-content">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-underline no-hover-bg">
                            <li class="nav-item">
                                <a class="nav-link active" id="base-limit" data-toggle="tab" aria-controls="limit"
                                href="#limit" aria-expanded="true">patient profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="base-market" data-toggle="tab" aria-controls="market" href="#market"
                                aria-expanded="false">{{ trans('main-sidebar.invoice') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="base-stop-limit" data-toggle="tab" aria-controls="stop-limit"
                                href="#stop-limit" aria-expanded="false">{{ trans('main-sidebar.receipt') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="base-payment" data-toggle="tab" aria-controls="payment"
                                href="#payment" aria-expanded="false">{{ trans('main-sidebar.payment') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="base-patient_accounts" data-toggle="tab" aria-controls="patient_accounts"
                                href="#patient_accounts" aria-expanded="false">كشف حساب</a>
                            </li>
                            </ul>
                            <div class="tab-content px-1 pt-1">
                            <div role="tabpanel" class="tab-pane active" id="limit" aria-expanded="true" aria-labelledby="base-limit">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table id="example" class="table display nowrap table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>{{ trans('patient.name') }}</th>
                                                <th>{{ trans('patient.email') }}</th>
                                                <th>{{ trans('patient.date_of_birth') }}</th>
                                                <th>{{ trans('patient.phone') }}</th>
                                                <th>{{ trans('patient.gender') }}</th>
                                                <th>{{ trans('patient.blood_group') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($patient)
                                                <tr>
                                                    <td>{{ $patient->name }}</td>
                                                    <td>{{$patient->email }}</td>
                                                    <td>{{$patient->date_of_birth}}</td>
                                                    <td>{{$patient->phone}}</td>
                                                    <td>{{$patient->gender}}</td>
                                                    <td>{{$patient->blood_group}}</td>
                                                </tr>
                                            @endisset
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="market" aria-labelledby="base-market">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table id="example" class="table display nowrap table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>##</th>
                                                <th>{{ trans('service.name') }}</th>
                                                <th>{{ trans('invoice.invoice_date') }}</th>
                                                <th>{{ trans('doctor.name') }}</th>
                                                <th>{{ trans('service.name') }}</th>
                                                <th>{{ trans('invoice.total_with_tax') }}</th>
                                                <th>{{ trans('invoice.type') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($invoices)
                                                @foreach($invoices as $invoice)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$invoice->service->name}}</td>
                                                        <td>{{$invoice->invoice_date}}</td>
                                                        <td>{{$invoice->doctor->name}}</td>
                                                        <td>{{$invoice->service->name}}</td>
                                                        <td>{{$invoice->total_with_tax}}</td>
                                                        <td>{{$invoice->type == 1 ? 'نقدي' : 'اجل'}}</td>
                                                    </tr>
                                                    @include('dashboard.invoices.delete')
                                                @endforeach
                                                <tr>
                                                    <th colspan="5" scope="row" class="alert alert-success">
                                                        الاجمالي
                                                    </th>
                                                    <td class="alert alert-primary">
                                                        {{ number_format($invoice->total_with_tax,2) }}
                                                    </td>
                                                </tr>
                                            @endisset
                                            </tbody>

                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="stop-limit" aria-labelledby="base-stop-limit">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table display nowrap table-striped table-bordered">
                                            <thead class="">
                                            <tr>
                                                <th>##</th>
                                                <th>{{ trans('patient.name') }}</th>
                                                <th>{{ trans('receipt.depit') }}</th>
                                                <th>{{ trans('receipt.description') }}</th>
                                                <th>{{ trans('receipt.date')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($receipts)
                                                @foreach($receipts as $receipt)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td> {{$receipt->patient->name}}</a></td>
                                                        <td>{{number_format($receipt->debit,2)}}</td>
                                                        <td>{{\Str::limit($receipt->description,60)}}</td>
                                                        <td>{{$receipt->date}}</td>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="payment" aria-labelledby="base-payment">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table display nowrap table-striped table-bordered">
                                            <thead class="">
                                            <tr>
                                                <th>##</th>
                                                <th>{{ trans('patient.name') }}</th>
                                                <th>{{ trans('payment.credit') }}</th>
                                                <th>{{ trans('receipt.description') }}</th>
                                                <th>{{ trans('receipt.date')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($payments)
                                                @foreach($payments as $payment)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td> {{$payment->patient->name}}</a></td>
                                                        <td>{{number_format($payment->credit,2)}}</td>
                                                        <td>{{\Str::limit($payment->description,60)}}</td>
                                                        <td>{{$payment->date}}</td>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="patient_accounts" aria-labelledby="base-patient_accounts">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table display nowrap table-striped table-bordered">
                                            <thead class="">
                                            <tr>
                                                <th>##</th>
                                                <th>{{ trans('receipt.date')}}</th>
                                                <th>{{ trans('receipt.description') }}</th>
                                                <th>مدين</th>
                                                <th>دائن</th>
                                                <th>الرصيد النهائي</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($patient_accounts)
                                                @foreach($patient_accounts as $patient_account)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$patient_account->date}}</td>
                                                        @if ($patient_account->invoice_id == true)
                                                            <td>{{\Str::limit($patient_account->invoice->description,60)}}</td>
                                                        @elseif($patient_account->receipt_id == true)
                                                            <td>{{\Str::limit($patient_account->receipt->description,60)}}</td>
                                                        @elseif($patient_account->payment_id == true)
                                                            <td>{{\Str::limit($patient_account->payment->description,60)}}</td>
                                                        @endif
                                                        <td>{{number_format($patient_account->debit,2)}}</td>
                                                        <td>{{number_format($patient_account->credit,2)}}</td>
                                                        <td></td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <th colspan="3" scope="row" class="alert alert-success">
                                                        الاجمالي
                                                    </th>
                                                    <td class="alert alert-primary">{{ number_format($debit = $patient_account->sum('debit'),2) }}</td>
                                                    <td class="alert alert-primary">{{ number_format($credit = $patient_account->sum('credit'),2) }}</td>
                                                    <td class="alert alert-danger">{{ $debit-$credit }} {{$debit-$credit > 0  ? 'مدين': 'دائن'}}</td>
                                                </tr>
                                            @endisset
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!--/ Trade History & Place Order -->
                </section>
            </div>
    </div>
</div>    
@endsection