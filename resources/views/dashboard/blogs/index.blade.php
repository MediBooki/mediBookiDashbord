@extends('layouts.app')
@section('title','page | Blogs')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('main-sidebar.blogs') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('main-sidebar.blogs') }}
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
                                <h4 class="card-title">All {{ trans('main-sidebar.blogs') }}</h4>
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
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#heading1AddBlogs"  >{{ trans('blog.Add') }}</a>
                                </div>
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table display nowrap table-striped table-bordered">
                                            <thead class="">
                                                <tr>
                                                    <th>##</th>
                                                    <th>{{ trans('blog.title') }}</th>
                                                    <th>{{ trans('blog.photo') }}</th>
                                                    <th>{{ trans('section.section') }}</th>
                                                    <th>{{ trans('blog.description') }}</th>
                                                    <th>{{ trans('main-sidebar.Date')}}</th>
                                                    <th>{{ trans('main-sidebar.Control')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @isset($blogs)
                                                @foreach($blogs as $blog )
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$blog->title}}</td>
                                                        <td>
                                                            <img style="width: 150px; height: 100px;" src="{{$blog->getFirstMediaUrl('photo')}}">
                                                        </td>
                                                        <td>{{$blog->section->name}}</td>
                                                        <td>{{\Str::limit($blog ->description,60)}}</td>
                                                        <td>{{$blog ->created_at->diffForHumans()}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <button class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#edit{{ $blog ->id }}">{{ trans('main-sidebar.Update')}}</button>
                                                                <button type="button" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#delete{{ $blog ->id }}" >{{ trans('main-sidebar.Delete')}}</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @include('dashboard.blogs.delete')
                                                    @include('dashboard.blogs.edit')
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                                {{ $blogs->links() }}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('dashboard.blogs.create')
                </div>
            </section>
        </div>
    </div>
</div>    
@endsection