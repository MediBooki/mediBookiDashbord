<!-- Modal -->
<div class="modal fade text-left" id="edit{{ $ambulance->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel27"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="myModalLabel27">{{ trans('main-sidebar.Update') }}</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('ambulances.update', 'test') }}" method="post" autocomplete="off">
                {{ method_field('patch') }}
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $ambulance->id }}">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('ambulance.car_number') }}</label>
                                <input type="text" id="name"  class="form-control"  placeholder="  "  value="{{$ambulance->car_number}}"  name="car_number">
                                @error("car_number")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('ambulance.car_model') }}</label>
                                <input type="text" id="name"
                                    class="form-control"
                                    placeholder="  "
                                    value="{{$ambulance->car_model}}"
                                    name="car_model">
                                @error("car_model")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('ambulance.car_year_made') }}</label>
                                <input type="text" id="name"
                                    class="form-control"
                                    placeholder="  "
                                    value="{{$ambulance->car_year_made}}"
                                    name="car_year_made">
                                @error("car_year_made")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('ambulance.dirver_name_ar') }}</label>
                                <input type="text" id="name"
                                    class="form-control"
                                    placeholder="  "
                                    value="{{$ambulance->getTranslation('driver_name', 'ar')}}"
                                    name="driver_name">
                                @error("driver_name")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('ambulance.dirver_name_en') }}</label>
                                <input type="text" id="name"
                                    class="form-control"
                                    placeholder="  "
                                    value="{{$ambulance->getTranslation('driver_name', 'en')}}"
                                    name="driver_name_en">
                                @error("driver_name_en")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('ambulance.driver_license_number') }}</label>
                                <input type="text" id="name"
                                    class="form-control"
                                    placeholder="  "
                                    value="{{$ambulance->driver_license_number}}"
                                    name="driver_license_number">
                                @error("driver_license_number")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('ambulance.driver_phone') }}</label>
                                <input type="text" id="name"
                                    class="form-control"
                                    placeholder="  "
                                    value="{{$ambulance->driver_phone}}"
                                    name="driver_phone">
                                @error("driver_phone")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('ambulance.status') }}
                                </label>
                                <select name="is_available" class="select form-control">
                                    <optgroup label="{{ trans('ambulance.status') }}">
                                        <option value="1">{{ trans('doctor.enabled') }}</option>
                                        <option value="0">{{ trans('doctor.disabled') }}</option>
                                    </optgroup>
                                </select>
                                @error('is_available')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-danger" data-dismiss="modal">{{ trans('main-sidebar.Back')}}</button>
                    <button type="submit" class="btn btn-outline-primary">{{ trans('main-sidebar.Update')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>