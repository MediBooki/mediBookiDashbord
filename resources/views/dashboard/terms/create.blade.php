<!-- Modal -->
<div class="modal fade text-left" id="heading1Addterms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel27"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="myModalLabel27">{{ trans('term.Add') }}</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('terms.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('term.term_title_ar') }}</label>
                                <input type="text" id="title"
                                    class="form-control"
                                    placeholder="  "
                                    value="{{old('title')}}"
                                    name="title">
                                @error("title")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('term.term_title_en') }}</label>
                                <input type="text" id="title"
                                    class="form-control"
                                    placeholder="  "
                                    value="{{old('title_en')}}"
                                    name="title_en">
                                @error("title_en")
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
                                <textarea  name="description" id="description" class="form-control">{{old('description')}}</textarea>
                                @error("description")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">{{ trans('category.category_description_en') }}
                                </label>
                                <textarea  name="description_en" id="description" class="form-control">{{old('description_en')}}</textarea>
                                @error("description_en")
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