
<div class="modal fade text-left" id="edit{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel27"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="myModalLabel27">{{ trans('slider.update') }}</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sliders.update', 'test') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                {{ method_field('patch') }}
                @csrf
                <div class="modal-body">
                    <div class="row m-1">
                        <label> {{ trans('section.Photo') }} </label>
                        <label id="projectinput7" class="file center-block">
                            <input type="file" accept="image/*" name="photo" onchange="loadFile(event)">
                            <img class="d-none" width="150px" height="150px" id="output" />
                        </label>
                        @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $slider->id }}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('slider.slider_title_ar') }}</label>
                                <input type="text" id="name"
                                        class="form-control"
                                        placeholder="  "
                                        value="{{ $slider->getTranslation('title', 'ar') }}"
                                        name="title">
                                @error("title")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('slider.slider_title_en') }} </label>
                                <input type="text" id="name"
                                        class="form-control"
                                        placeholder="  "
                                        value="{{$slider->getTranslation('title', 'en')}}"
                                        name="title_en">
                                @error("title_en")
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