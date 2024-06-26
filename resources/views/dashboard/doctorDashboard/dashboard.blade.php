@extends('layouts.app')
@section('title','dashboard')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
          <p>{{ trans('main-sidebar.doctor_dashobard') }}</p>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card pull-up">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="info">{{ \App\Models\Invoice::where('doctor_id',auth()->user()->id)->count() }}</h3>
                            <h6>{{ trans('dashboard.invoice_num') }}</h6>
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
                            <h3 class="warning">
                                {{ \App\Models\Invoice::where('doctor_id',auth()->user()->id)->where('status',1)->count() }}
                            </h3>
                            <h6>{{ trans('dashboard.invoice_num_not_complete') }}</h6>
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
                            <h3 class="success">
                              {{ \App\Models\Invoice::where('doctor_id',auth()->user()->id)->where('status',3)->count() }}
                            </h3>
                            <h6>{{ trans('dashboard.invoice_num_complete') }}</h6>
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
                            <h3 class="danger">{{ \App\Models\Invoice::where('doctor_id',auth()->user()->id)->where('status',2)->count() }}</h3>
                            <h6>{{ trans('dashboard.invoice_num_revsion') }}</h6>
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
                            <h4 class="card-title"> {{ trans('service.top_services') }}</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                      <tr>
                                          <th> ##</th>
                                          <th>{{ trans('service.name') }}</th>
                                          <th>{{ trans('service.price') }}</th>
                                          <th>{{ trans('service.booking_count')}}</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                        @isset($bestServices)
                                          @foreach($bestServices as $service)
                                            <tr class="bg-success bg-lighten-5">
                                              <td>{{$loop->iteration}}</td>
                                              <td>{{$service->name}}</td>
                                              <td>{{$service->price}}</td>
                                              <td>{{ $service->booking_count }}</td>
                                            </tr>
                                          @endforeach
                                        @endisset
                                      </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                  <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ trans('doctor.Doctor_Reviews') }}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">

                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-de mb-0">
                                <thead>
                                <tr>
                                    <th>{{ trans('patient.name') }}</th>
                                    <th>{{ trans('doctor.comment') }}</th>
                                    <th>{{ trans('doctor.rating') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @isset($rating)
                                    @foreach($rating as $rate)
                                      <tr class="bg-danger bg-lighten-5">
                                          <td>{{ $rate->patient->name }}</td>
                                          <td>{{ $rate->comment }}</td>
                                          <td>{{ $rate->rating }}</td>
                                      </tr>
                                      @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!--/ Sell Orders & Buy Order -->
            {{-- <div class="row">
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
            </div> --}}
        </div>
    </div>
</div>

@endsection