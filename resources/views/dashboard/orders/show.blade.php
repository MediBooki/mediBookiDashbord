@extends('layouts.app')
@section('title',' Page | Invoice')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">{{ trans('order.invoice') }}</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('main-sidebar.index')}} </a>
                </li>
                <li class="breadcrumb-item"><a href="{{route('Dash_orders.index')}}"> {{ trans('main-sidebar.orders') }} </a>
                </li>
                <li class="breadcrumb-item active">{{ trans('order.invoice') }}
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
              {{-- <div class="col-sm-12 text-center text-md-left">
                <p class="text-muted">{{ trans('order.invoice') }}</p>
              </div> --}}
              <div class="col-md-6 col-sm-12 text-center text-md-left">
                <ul class="px-0 list-unstyled">
                  <li class="text-bold-800">{{$order->first_name}} {{ $order->last_name }}</li>
                  <li>{{$order->phone1}}</li>
                  <li>{{$order->state}},{{$order->city}}</li>
                  <li>{{$order->address1}}</li>
                </ul>
              </div>
              <div class="col-md-6 col-sm-12 text-center text-md-right">
                <p><span class="text-muted"> {{ trans('order.invoice_date') }}</span> {{ Carbon\Carbon::now()->format('d/m/Y') }}</p>
                <p><span class="text-muted">{{ trans('order.zip_code') }} :</span> {{ $order->zip_code }}</p>
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
                        <th>{{ trans('order.medicine_name') }}</th>
                        <th class="text">{{ trans('order.qty') }}</th>
                        <th class="text-right">{{ trans('order.price') }} </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->medicines as $product)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><p>{{$product->name}}</p></td>
                                <td class="text">{{$product->pivot->qty}}</td>
                                <td class="text-right">{{$product->price*$product->pivot->qty}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-md-7 col-sm-12 text-center text-md-left">
                  <p class="lead">Payment Methods:</p>
                  <div class="row">
                    <div class="col-md-8">
                      <table class="table table-borderless table-sm">
                        <tbody>
                          <tr>
                            <td>{{$order->status == 1 ? 'Credit Card' : 'cash'}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 col-sm-12">
                  <p class="lead">{{ trans('order.total') }}</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                          <td>{{ trans('order.total') }}</td>
                          <td class="text-right">pound{{$order->total}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
         <!-- Invoice Footer -->
         <div id="invoice-footer">
            <div class="row">
              <div class="col-md-12 col-sm-12 text-center">
                <button type="button" class="btn btn-info btn-lg my-1" id="print_Button" onclick="printDiv()"><i class="la la-paper-plane-o"></i> {{ trans('order.print') }}</button>
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