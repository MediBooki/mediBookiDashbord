<!-- Modal -->
<style>
    .select2-container {
      width: 100% !important;
}
</style>
<div class="modal fade text-left" id="edit{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel27"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="myModalLabel27">{{ trans('doctor.update_status') }}</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('doctors.update', 'test') }}" method="post" autocomplete="off">
                {{ method_field('patch') }}
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $doctor->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('doctor.status') }}
                                </label>
                                <select name="status" class="select form-control">
                                    <optgroup label="{{ trans('doctor.update_status') }}">
                                        <option value="1" @if($doctor->status && $doctor->status == 1) selected @endif>{{ trans('doctor.enabled') }}</option>
                                        <option value="0" @if($doctor->status && $doctor->status == 0) selected @endif>{{ trans('doctor.disabled') }}</option>
                                    </optgroup>
                                </select>
                                @error('status')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <div class="form-group"> --}}
                                <label for="projectinput1"> {{ trans('doctor.appointments') }}
                                </label>
                                <select name="appointments[]" class="select2 form-control w-100" multiple>
                                    <optgroup label="{{ trans('doctor.appointments') }}">
                                        @if($appointments && $appointments -> count() > 0)
                                            @foreach($appointments as $appointment)
                                                <option value="{{$appointment->id }}" @if(in_array($appointment->id,$doctor->appointments->pluck('id')->toArray())) selected @endif>{{$appointment->name}}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                                @error('appointments')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            {{-- </div> --}}
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