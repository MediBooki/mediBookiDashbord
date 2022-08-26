<!-- Modal -->
<div class="modal fade text-left" id="edit{{ $patient->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel27"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="myModalLabel27">{{ trans('main-sidebar.Update') }}</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('patients.update', 'test') }}" method="post" autocomplete="off">
                {{ method_field('patch') }}
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $patient->id }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('patient.name') }}</label>
                                <input type="text" id="name"
                                    class="form-control"
                                    placeholder="  "
                                    value="{{$patient->name}}"
                                    name="name">
                                @error("name")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('patient.date_of_birth') }}</label>
                                <input type="date" id="name"
                                    class="form-control"
                                    placeholder="  "
                                    value="{{$patient->date_of_birth}}"
                                    name="date_of_birth">
                                @error("date_of_birth")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('patient.phone') }}</label>
                                <input type="text" id="name"
                                    class="form-control"
                                    placeholder="  "
                                    value="{{$patient->phone}}"
                                    name="phone">
                                @error("phone")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('patient.blood_group') }}</label>
                                <select name="blood_group" class="select form-control">
                                    <optgroup label="{{ trans('patient.blood_group') }}">
                                        <option value="o-" {{ $patient->blood_group == 'o-' ? 'selected' : '' }}>o-</option>
                                        <option value="o+" {{ $patient->blood_group == 'o+' ? 'selected' : '' }}>o+</option>
                                        <option value="A-" {{ $patient->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                                        <option value="A+" {{ $patient->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                                        <option value="B-" {{ $patient->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                                        <option value="B+" {{ $patient->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                                        <option value="AB-" {{ $patient->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                                        <option value="AB+" {{ $patient->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('patient.address') }}</label>
                                <input type="text" id="name"
                                    class="form-control"
                                    placeholder="  "
                                    value="{{$patient->address}}"
                                    name="address">
                                @error("address")
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