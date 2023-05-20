<!-- Modal -->
<div class="modal fade text-left" id="delete{{$doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel27"
    aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title" id="myModalLabel27">{{ trans('main-sidebar.Delete')}} {{ trans('main-sidebar.doctors') }}</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('doctors.destroy', 'test') }}" method="post" autocomplete="off">
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" name="id" class="form-control" value="{{ $doctor->id }}" />
                <h2>{{trans('doctor.doctor_delete')}} {{ $doctor->name }} </h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-primary" data-dismiss="modal">{{ trans('main-sidebar.Back')}}</button>
                <button type="submit" class="btn btn-outline-danger">{{ trans('main-sidebar.Delete')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>