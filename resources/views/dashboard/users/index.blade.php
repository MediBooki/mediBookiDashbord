@extends('layouts.app')
@section('title','page | users')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('main-sidebar.users') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('main-sidebar.users') }}
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
                                <h4 class="card-title">All {{ trans('main-sidebar.users') }}</h4>
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
                                    <a href="{{ route('users.create') }}" class="btn btn-primary">{{ trans('user.Add') }}</a>
                                </div>
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table id="example" class="table display nowrap table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>##</th>
                                                <th>{{ trans('user.name') }}</th>
                                                <th>{{ trans('user.email') }}</th>
                                                <th>{{ trans('user.status') }}</th>
                                                <th>{{ trans('user.role_name') }}</th>
                                                <th>{{ trans('main-sidebar.Control')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($users)
                                                @foreach($users as $user)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td><a href="{{route('users.show', $user->id)}}">{{ $user->name }}</a></td>
                                                        <td>{{$user->email }}</td>
                                                        <td>
                                                            <span class="badge badge-pill badge-{{$user->status == 1 ? 'success':'danger'}}">
                                                                {{ $user->status == 1 ? trans('doctor.enabled') :  trans('doctor.disabled')}}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            @if (!empty($user->getRoleNames()))
                                                                @foreach ($user->getRoleNames() as $v)
                                                                    <label class="badge badge-success">{{ $v }}</label>
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                        <td>                                                          
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                    {{ trans('main-sidebar.Control')}}
                                                                </button>
                                                                <div class="dropdown-menu" style="right: -50%;">
                                                                    <a class="dropdown-item"  href="{{ route('users.edit', $user->id) }}"><i class="text-success la la-edit"></i>{{ trans('main-sidebar.Update') }}</a>                                                                    
                                                                    <a class="dropdown-item" data-target="#delete{{ $user->id }}"data-toggle="modal" ><i class="text-danger la la-trash"></i>{{ trans('main-sidebar.Delete')}}</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @include('dashboard.users.delete')
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    {{-- <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                                {{ $users->links() }}
                                            </ul>
                                        </div>
                                    </div> --}}
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