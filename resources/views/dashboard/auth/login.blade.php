@extends('layouts.login')
@section('title','login')
@section('style')
<style type="text/css">
    .loginform{
        display: none;
    }
</style>
@endsection
@section('content')
    <section class="flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <div class="p-1">
                                <img src="{{asset('assets/admin/images/logo/GP2.png')}}" alt="LOGO"/>

                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                            <span>login dashboard </span>
                        </h6>
                    </div>
                    @include('dashboard.includes.alerts.errors')
                    @include('dashboard.includes.alerts.success')

                  
                    <div class="card-content">
                       
                        <div class="card-body">
                            <div class="form-group">
                                <label for="sectionchoose">حدد طريقة الدخول</label>
                                <select class="form-control" id="sectionchoose">
                                    <option selected disabled>تختار من القائمة</option>
                                    <option value="doctor">دخول دكتور </option>
                                    <option value="admin">الدخول كأدمن</option>
                                </select>
                            </div>
                            {{-- Form User --}}
                            <div class="loginform" id="doctor">
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>دخول دكتور </span>
                                </h6>
                                <form class="form-horizontal form-simple" action="{{ route('login.doctor') }}" method="post"
                                    novalidate>
                                    @csrf
                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                        <input type="text" name="email" class="form-control form-control-lg input-lg"
                                            value="" id="email" placeholder="enter email ">
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" name="password" class="form-control form-control-lg input-lg"
                                            id="user-password"
                                            placeholder="enter password">
                                        <div class="form-control-position">
                                            <i class="la la-key"></i>
                                        </div>
                                        @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </fieldset>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-12 text-center text-md-left">
                                            <fieldset>
                                                <input type="checkbox" name="remember_me" id="remember-me"
                                                    class="chk-remember">
                                                <label for="remember-me">remember me</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i>
                                        login
                                    </button>
                                </form>
                            </div>
                             {{-- Form Admin --}}
                             <div class="loginform" id="admin">
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>الدخول كأدمن </span>
                                </h6>
                                <form class="form-horizontal form-simple" action="{{ route('login') }}" method="post"
                                    novalidate>
                                    @csrf
                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                        <input type="text" name="email" class="form-control form-control-lg input-lg"
                                            value="" id="email" placeholder="enter email ">
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" name="password" class="form-control form-control-lg input-lg"
                                            id="user-password"
                                            placeholder="enter password">
                                        <div class="form-control-position">
                                            <i class="la la-key"></i>
                                        </div>
                                        @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </fieldset>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-12 text-center text-md-left">
                                            <fieldset>
                                                <input type="checkbox" name="remember_me" id="remember-me"
                                                    class="chk-remember">
                                                <label for="remember-me">remember me</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i>
                                        login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script type="text/javascript">
        $('#sectionchoose').change(function(){
            var Id = $(this).val();
            $('.loginform').each(function(){
                Id === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection