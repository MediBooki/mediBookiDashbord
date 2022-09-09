<!-- Modal -->
<div class="modal fade text-left" id="update{{ $laboratory->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel27"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="myModalLabel27">{{ trans('main-sidebar.Update') }}</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laboratories.update','test') }}" method="post" autocomplete="off">
                {{ method_field('patch') }}
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $laboratory->id }}">
                    <input type="hidden" name="invoice_id" value="{{ $laboratory->invoice_id }}">
                    <input type="hidden" name="patient_id" value="{{ $laboratory->patient_id }}">
                    <input type="hidden" name="doctor_id" value="{{ $laboratory->doctor_id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('lab.description') }}</label>
                                <textarea  name="description" id="description" class="form-control">{{ $laboratory->description }}</textarea>
                                @error("description")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-danger" data-dismiss="modal">{{ trans('main-sidebar.Back')}}</button>
                    <button type="submit" class="btn btn-outline-primary">{{ trans('main-sidebar.Submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>