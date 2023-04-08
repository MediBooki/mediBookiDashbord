<!-- Modal -->
<div class="modal fade text-left" id="edit{{ $patient_ray->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel27"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="myModalLabel27">{{ trans('main-sidebar.Update') }}</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('rayInfo.update','test') }}" method="post" enctype="multipart/form-data" autocomplete="off" >
                {{ method_field('patch') }}
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $patient_ray->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('xray.description') }}</label>
                                <textarea  name="description_user" id="description" class="form-control">{{ $patient_ray->description_user }}</textarea>
                                @error("description_user")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="projectinput1"> ارفاق الاشعة</label>
                                <input type="file" name="photo" accept="image/*">
                                <br>
                                @error("photo")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="checkbox" name="nemo" value="1">
                                <label for="projectinput1"> الالتهاب الرئوي</label>
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