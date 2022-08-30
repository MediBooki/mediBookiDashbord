@extends('layouts.app')
@section('title','Print | payments')
@section('content')


<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('main-sidebar.payment') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('main-sidebar.payment') }}
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
                  <li>{{ trans('main-sidebar.payment') }}</li>
                </ul>
              </div>
              <div class="col-md-6 col-sm-12 text-center text-md-right">
                <p> {{ Carbon\Carbon::now()->format('d/m/Y') }}</p>
                
                <p>{{ $payment->patient->name }}</p>
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
                        <th>{{ trans('receipt.description') }}</th>
                        <th class="text">{{ trans('payment.credit') }}</th>
                        <th class="text">{{ trans('receipt.date') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                       
                            <tr>
                                <th scope="row">1</th>
                                <td><p>{{ $payment->description }}</p></td>
                                <td><p>{{ $payment->credit }}</p></td>
                                <td><p>{{ $payment->date }}</p></td>
                            </tr>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>
         <!-- Invoice Footer -->
         <div id="invoice-footer">
            <div class="row">
              <div class="col-md-12 col-sm-12 text-center">
                <button type="button" class="btn btn-info btn-lg my-1" id="print_Button" onclick="printDiv()"><i class="la la-paper-plane-o"></i> {{ trans('main-sidebar.Print') }}</button>
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