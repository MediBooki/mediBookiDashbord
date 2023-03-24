<!-- Modal -->
<div class="modal fade text-left" id="edit{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel27"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="myModalLabel27">{{ trans('category.update') }}</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('categories.update', 'test') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                {{ method_field('patch') }}
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('category.category_name_ar') }}</label>
                                <input type="text" id="name"
                                        class="form-control"
                                        placeholder="  "
                                        value="{{ $category->getTranslation('name', 'ar') }}"
                                        name="name">
                                @error("name")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('category.category_name_en') }} </label>
                                <input type="text" id="name"
                                        class="form-control"
                                        placeholder="  "
                                        value="{{$category->getTranslation('name', 'en')}}"
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
                                <label for="projectinput1">{{ trans('category.category_description_ar') }}
                                </label>
                                <textarea  name="description" id="description" class="form-control">{{$category->getTranslation('description', 'ar')}}</textarea>
                                @error("description")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">{{ trans('category.category_description_en') }}
                                </label>
                                <textarea  name="description_en" id="description" class="form-control">{{$category->getTranslation('description', 'en')}}</textarea>
                                @error("description_en")
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