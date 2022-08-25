<!-- Modal -->
<div class="modal fade text-left" id="edit{{ $insurance->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel27"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="myModalLabel27">{{ trans('insurance.update') }}</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('insurances.update', 'test') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                {{ method_field('patch') }}
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $insurance->id }}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('insurance.insurance_name_ar') }}</label>
                                <input type="text" id="name"
                                        class="form-control"
                                        placeholder="  "
                                        value="{{ $insurance->getTranslation('name', 'ar') }}"
                                        name="name">
                                @error("name")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('insurance.insurance_name_en') }} </label>
                                <input type="text" id="name"
                                        class="form-control"
                                        placeholder="  "
                                        value="{{$insurance->getTranslation('name', 'en')}}"
                                        name="name_en">
                                @error("name_en")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">{{ trans('insurance.insurance_code') }}</label>
                                <input type="text" id="name"
                                    class="form-control"
                                    placeholder="  "
                                    value="{{$insurance->insurance_code}}"
                                    name="insurance_code">
                                @error("insurance_code")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('insurance.status') }}
                                </label>
                                <select name="status" class="select form-control">
                                    <optgroup label="{{ trans('insurance.status') }}">
                                        <option value="1">{{ trans('doctor.enabled') }}</option>
                                        <option value="0">{{ trans('doctor.disabled') }}</option>
                                    </optgroup>
                                </select>
                                @error('status')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">{{ trans('insurance.discount_percentage') }}</label>
                                <input type="text" id="name"
                                    class="form-control"
                                    placeholder="  "
                                    value="{{$insurance->discount_percentage}}"
                                    name="discount_percentage">
                                @error("discount_percentage")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">{{ trans('insurance.company_rate') }}</label>
                                <input type="text" id="name"
                                    class="form-control"
                                    placeholder="  "
                                    value="{{$insurance->company_rate}}"
                                    name="company_rate">
                                @error("company_rate")
                                <span class="text-danger">{{$message}}</span>
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