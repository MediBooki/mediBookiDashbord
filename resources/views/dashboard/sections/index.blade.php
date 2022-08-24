@extends('layouts.app')
@section('title','page | Sections')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('main-sidebar.sections') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{ trans('main-sidebar.sections') }}
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
                                <h4 class="card-title">All {{ trans('main-sidebar.sections') }}</h4>
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
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#heading1AddSections"  >{{ trans('section.Add') }}</a>
                                </div>
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table display nowrap table-striped table-bordered">
                                            <thead class="">
                                            <tr>
                                                <th>##</th>
                                                <th>{{ trans('section.name') }}</th>
                                                <th>{{ trans('section.description') }}</th>
                                                <th>{{ trans('section.Photo') }}</th>
                                                <th>{{ trans('main-sidebar.Date')}}</th>
                                                <th>{{ trans('main-sidebar.Control')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($sections)
                                                @foreach($sections as $section)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td><a href="{{route('sections.show',$section->id)}}"> {{$section->name}}</a></td>
                                                        <td>{{\Str::limit($section->description,60)}}</td>
                                                        <td><img style="width: 150px; height: 100px;" src="{{$section->getFirstMediaUrl('photo')}}"></td>
                                                        <td>{{$section ->created_at->diffForHumans()}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <button class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#edit{{ $section->id }}">{{ trans('main-sidebar.Update')}}</button>
                                                                <button type="button" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#delete{{ $section->id }}" >{{ trans('main-sidebar.Delete')}}</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @include('dashboard.sections.delete')
                                                    @include('dashboard.sections.edit')
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                                {{ $sections->links() }}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('dashboard.sections.create')
                </div>
            </section>
        </div>
    </div>
</div>    
@endsection
@section('script')
    <script>
        var loadFile = function(event){
            var output = document.getElementById('output');
            output.classList.remove("d-none");
            output.src = URL.createObjectURL(event.target.files[0]);
            output.load = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
@endsection