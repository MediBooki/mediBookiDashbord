@extends('layouts.app')
@section('title','Print | invoices')
@section('content')


<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('main-sidebar.invoice') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('main-sidebar.invoice') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
      </div>
      <div class="content-body">
        <section class="card" id="print">
          <div id="invoice-template" class="card-body" >
            <!-- Invoice Customer Details -->
            <div id="invoice-customer-details" class="row pt-2">
              <div class="col-sm-12 text-center">
                <img src="{{asset('assets/admin/images/logo/GP2.png')}}" alt="LOGO"/>
              </div>
              <div class="col-md-6 col-sm-12 text-center text-md-left">
                <ul class="px-0 list-unstyled">
                  <li class="text-bold-800"><span class="text-muted"> تاريخ الطباعة</span></li>
                  <hr>
                  <li>{{ trans('patient.name') }}</li>
                  <hr>
                  <li>{{ trans('doctor.name') }}</li>
                  <hr>
                  <li>{{ trans('section.name') }}</li>
                  <hr>
                  <li>{{ trans('main-sidebar.invoice') }}</li>
                </ul>
              </div>
              <div class="col-md-6 col-sm-12 text-center text-md-right">
                <p> {{ Carbon\Carbon::now()->format('d/m/Y') }}</p>
                <br>
                <p>{{ $invoice->patient->name }}</p>
                <br>
                <p>{{ $invoice->doctor->name }}</p>
                <br>
                {{-- <p>{{ $invoice->section->name }}</p> --}}
              </div>
            </div>
            <!--/ Invoice Customer Details -->
            <!-- Invoice Items Details -->
            <div id="invoice-items-details" class="pt-2">
              <div class="row">
                <div class="table-responsive col-sm-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>{{ trans('service.name') }}</th>
                        <th class="text">{{ trans('service.price') }}</th>
                        <th class="text">{{ trans('invoice.type') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <th scope="row">1</th>
                          <td><p>{{ $invoice->service->name }}</p></td>
                          <td><p>{{ $invoice->service->price }}</p></td>
                          <td><p>{{ $invoice->type == 1 ? 'نقدي' : 'اجل' }}</p></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-md-7 col-sm-12 text-center text-md-left">
                  <p class="lead"></p>
                  <div class="row">
                    <div class="col-md-8">
                      <table class="table table-borderless table-sm">
                        <tbody>
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 col-sm-12">                  
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>الاجمالي</td>
                          <td class="text-right">{{ $invoice->service->price }}</td>
                        </tr>
                        <tr>
                          <td>{{ trans('invoice.discount_value') }}</td>
                          <td class="text-right">{{ $invoice->discount_value }}</td>
                        </tr>
                        <tr>
                          <td>{{ trans('invoice.tax_rate') }}</td>
                          <td class="text-right">{{ $invoice->tax_rate }}</td>
                        </tr>
                        <tr>
                          <td>{{ trans('invoice.total_with_tax') }}</td>
                          <td class="text-right" style="color: #00b1eb;">{{ $invoice->total_with_tax }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="text-center">
                    <p>Authorized person</p>
                    <img src="{{asset('assets/admin/images/pages/signature-scan.png')}}" alt="signature" class="height-100"
                    />
                    <h6>Mohamed Ali</h6>
                    <p class="text-muted">Full-Stack Web Developer</p>
                  </div>
                </div>
            </div>
          </div>
        </section>
         <!-- Invoice Footer -->
         <div id="invoice-footer">
            <div class="row">
              <div class="col-md-12 col-sm-12 text-center">
                <button type="button" class="btn btn-info btn-lg my-1" id="print_Button" onclick="printDiv()"><i class="la la-print"></i> {{ trans('main-sidebar.Print') }}</button>
              </div>
            </div>
          </div>
          <!--/ Invoice Footer -->
      </div>
    </div>
  </div>

@stop
@section('script')
    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endsection