<!-- Modal -->
<div class="modal fade text-left" id="insurance{{$patient->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel27"
    aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title" id="myModalLabel27">{{ trans('main-sidebar.Delete')}} {{ trans('main-sidebar.patient') }}</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('patients.edit', 'test') }}" method="post" autocomplete="off">
            {{ method_field('patch') }}
            {{ csrf_field() }}
            <div class="modal-body">
                 <input type="hidden" name="id" class="form-control" value="{{ $patient->id }}" />
               {{-- <h2>{{trans('patient.patient_delete')}}  {{ $patient->name }} </h2> --}}

                <div class="row">
                    <div class="col-md-6">
                        <h2>insurance number: <p>{{$patient->insurance_number}}</p></h2>
                    </div>
                    <div class="col-md-6">
                        <h2>insurance date: <p>{{$patient->insurance_date}}</p></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h2>insurance Company: <p>{{$patient->insurance->name}}</p></h2>
                    </div>
                    <div class="form-group">
                        <label for="projectinput1"> {{ trans('doctor.status') }}
                        </label>
                        <select name="status" class="select form-control">
                            <optgroup label="{{ trans('doctor.update_status') }}">
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
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-primary" data-dismiss="modal">{{ trans('main-sidebar.Back')}}</button>
                <button type="submit" class="btn btn-outline-danger">{{ trans('main-sidebar.Delete')}}</button>
            </div>
          {{-- </form> --}}
        </div>
      </div>
    </div>