<!-- Modal -->
<style>
    .select2-container  {
        width: 356px !important;
    }
</style>
<div class="modal fade text-left" id="edit{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel27"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="myModalLabel27">{{ trans('blog.update') }}</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('blogs.update', 'test') }}" method="post" enctype="multipart/form-data" autocomplete="off">
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
                        <input type="hidden" name="id" value="{{ $blog->id }}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('blog.blog_title_ar') }}</label>
                                <input type="text" id="name"
                                        class="form-control"
                                        placeholder="  "
                                        value="{{ $blog->getTranslation('title', 'ar') }}"
                                        name="title">
                                @error("title")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('blog.blog_title_en') }} </label>
                                <input type="text" id="name"
                                        class="form-control"
                                        placeholder="  "
                                        value="{{$blog->getTranslation('title', 'en')}}"
                                        name="title_en">
                                @error("title_en")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="projectinput1"> {{ trans('section.section') }}
                                </label>
                                <br>
                                <select name="section_id" class="select2 form-control">
                                    <optgroup label="{{ trans('section.section') }}">
                                        @if($sections && $sections -> count() > 0)
                                            @foreach($sections as $section)
                                                <option
                                                    value="{{$section->id }}" class="{{$section->id == $blog->section_id ? 'selected' : ''}}">{{$section->name}}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                                @error('section_id')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">{{ trans('blog.blog_description_ar') }}
                                </label>
                                <textarea  name="description" id="description" class="form-control">{{$blog->getTranslation('description', 'ar')}}</textarea>
                                @error("description")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">{{ trans('blog.blog_description_en') }}
                                </label>
                                <textarea  name="description_en" id="description" class="form-control">{{$blog->getTranslation('description', 'en')}}</textarea>
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