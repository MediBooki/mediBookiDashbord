@extends('layouts.app')
@section('title','page | Doctors')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ $category->name }}</h4>
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
                                    <a href="{{ route('doctors.create') }}" class="btn btn-primary">{{ trans('doctor.Add') }}</a>
                                    <button type="button" class="btn btn-danger mx-1" id="btn_delete_all">{{ trans('doctor.delete_select') }}</button>
                                </div>
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table id="example" class="table display nowrap table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>##</th>
                                                <th><input type="checkbox" name="select_all" id="exampleCheck1"></th>
                                                <th>{{ trans('doctor.name') }}</th>
                                                <th>{{ trans('doctor.photo') }}</th>
                                                <th>{{ trans('doctor.email') }}</th>
                                                <th>{{ trans('section.section') }}</th>
                                                <th>{{ trans('doctor.phone') }}</th>
                                                <th>{{ trans('doctor.appointments') }}</th>
                                                <th>{{ trans('doctor.status') }}</th>
                                                <th>{{ trans('main-sidebar.Control')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           
                                            </tbody>
                                        </table>
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
@section('script')
    <script>
        $(function() {
            jQuery("[name=select_all]").click(function(source){
                checkboxes = jQuery("[name=delete_select]");
                for(var i in checkboxes) {
                    checkboxes[i].checked = source.target.checked;
                }
            });
        });
    </script>
    <script type="text/javascript">
            $(function() {
                $('#btn_delete_all').click(function () {
                    var selected = [];
                    $("#example input[name=delete_select]:checked").each(function () {
                        selected.push(this.value);
                    });
                    if(selected.length > 0 ) {
                        $('#delete_select').modal('show');
                        $('input[id="delete_select_id"]').val(selected)
                    }
                });
            });
    </script>
@endsection