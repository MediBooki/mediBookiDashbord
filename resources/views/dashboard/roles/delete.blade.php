<!-- Modal -->
<div class="modal fade text-left" id="delete{{$role->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel27"
    aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title" id="myModalLabel27">{{ trans('main-sidebar.Delete')}} {{ trans('main-sidebar.role') }}</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('roles.destroy', 'test') }}" method="post" autocomplete="off">
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" name="id" class="form-control" value="{{ $role->id }}" />
                <h2>هل انت تريد حذف الصااحية  {{ $role->name }} </h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-primary" data-dismiss="modal">{{ trans('main-sidebar.Back')}}</button>
                <button type="submit" class="btn btn-outline-danger">{{ trans('main-sidebar.Delete')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>