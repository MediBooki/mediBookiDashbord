@extends('layouts.app')
@section('title','dashboard')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
          <p>لوحة تحكم الموظفين</p>
        </div>
        <div class="content-body">
            <div id="crypto-stats-3" class="row">
                <div class="col-xl-4 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>
                                    </div>
                                    <div class="col-5 pl-2">
                                        <h4> عدد الفواتير</h4>
                                        
                                    </div>
                                    <div class="col-5 text-right">
                                        <h4>{{ \App\Models\Invoice::count() }}</h4>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="btc-chartjs" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i></h1>
                                    </div>
                                    <div class="col-5 pl-2">
                                        <h4>dsds</h4>
                                    </div>
                                    <div class="col-5 text-right">
                                        <h4>2</h4>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="eth-chartjs" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>
                                    </div>
                                    <div class="col-5 pl-2">
                                        <h4> sd</h4>
                                       
                                    </div>
                                    <div class="col-5 text-right">
                                        <h4>22</h4>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="xrp-chartjs" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card pull-up">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="info">{{ \App\Models\Service::count() }}</h3>
                            <h6>عدد الخدمات</h6>
                          </div>
                          <div>
                            <i class="icon-basket-loaded info font-large-2 float-right"></i>
                          </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%"
                          aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card pull-up">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="warning">{{ \App\Models\Section::count() }}</h3>
                            <h6>عدد الاقسام</h6>
                          </div>
                          <div>
                            <i class="icon-pie-chart warning font-large-2 float-right"></i>
                          </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%"
                          aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card pull-up">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="success">{{ \App\Models\Patient::count() }}</h3>
                            <h6>عدد المرضي</h6>
                          </div>
                          <div>
                            <i class="icon-user-follow success font-large-2 float-right"></i>
                          </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%"
                          aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card pull-up">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="danger">{{ \App\Models\Doctor::count() }}</h3>
                            <h6>عدد الاطباء</h6>
                          </div>
                          <div>
                            <i class="icon-heart danger font-large-2 float-right"></i>
                          </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%"
                          aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- Sell Orders & Buy Order -->
            <div class="row match-height">
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> sd</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                      <tr>
                                          <th> sd</th>
                                          <th> sd</th>
                                          <th> sd</th>
                                          <th> sd</th>
                                          <th> sd</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                        {{-- @isset($orders)
                                          @foreach($orders as $order)
                                            <tr class="bg-success bg-lighten-5">
                                                <td>{{ $order->first_name }}</td>
                                                <td>{{ $order->phone1 }}</td>
                                                <td>{{ $order->email }}</td>
                                                <td>{{ $order->status==1 ?  trans('order.paid')  : trans('order.unpaid')}}</td>
                                                <td>{{ $order->total }}</td>
                                            </tr>
                                          @endforeach
                                        @endisset --}}
                                      </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ee</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                    <tr>
                                        <th> sd</th>
                                        <th> sd</th>
                                        <th> sd</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      {{-- @isset($rates)
                                        @foreach($rates as $rate)
                                          <tr class="bg-danger bg-lighten-5">
                                              <td>{{ $rate->user->name }}</td>
                                              <td>{{ $product->name }}</td>
                                              <td>{{ $rate->rating }}</td>
                                          </tr>
                                          @endforeach
                                        @endisset --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Sell Orders & Buy Order -->
            <div class="row">
              <div class="col-xl-6 col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> sd</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                      <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-content collapse show">
                    <div class="card-body pt-0">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> sd</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                      <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-content collapse show">
                    <div class="card-body pt-0">
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection