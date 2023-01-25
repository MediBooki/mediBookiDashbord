@extends('layouts.app')
@section('title','page | Booking Lists')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('main-sidebar.bookLists') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('main-sidebar.bookLists') }}
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
                                <h4 class="card-title">All {{ trans('main-sidebar.bookLists') }}</h4>
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
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table display nowrap table-striped table-bordered">
                                            <thead class="">
                                            <tr>
                                                <th>##</th>
                                                <th>{{ trans('patient.name') }}</th>
                                                {{-- <th>{{ trans('doctor.name') }}</th> --}}
                                                <th>{{ trans('bookList.date') }}</th>
                                                <th>{{ trans('bookList.time') }}</th>
                                                <th>{{ trans('bookList.price') }}</th>
                                                <th>{{ trans('bookList.status') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($bookLists)
                                                @foreach($bookLists as $bookList)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$bookList->patient->name}}</td>
                                                        {{-- <td>{{$bookList->doctor->name}}</td> --}}
                                                        <td>{{$bookList->date}}</td>
                                                        <td>{{$bookList->time}}</td>
                                                        <td>{{$bookList->price}}</td>
                                                        <td>
                                                            <span class="badge badge-pill badge-{{$bookList->status == 1 ? 'success':'danger'}}">
                                                                {{ $bookList->status == 1 ? trans('bookList.enabled') :  trans('bookList.disabled')}}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                                {{ $bookLists->links() }}
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