@extends('layouts.app')
@section('title','page | patient X-Ray')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">{{ trans('ray.photo') }}</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.doctor')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ trans('ray.photo') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-content">
            <div class="card-body  my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
              <div class="card-deck-wrapper">
                <div class="card-deck">
                  <figure class="card card-img-top border-grey border-lighten-2" itemprop="associatedMedia"
                  itemscope itemtype="http://schema.org/ImageObject">
                    <a href="{{$xray->getFirstMediaUrl('photo')}}" itemprop="contentUrl" data-size="480x360">
                      <img class="gallery-thumbnail card-img-top" 
                            src="{{$xray->getFirstMediaUrl('photo')}}"
                            itemprop="thumbnail"
                            alt="Image description" />
                    </a>
                    <div class="card-body px-0 ">
                      <h4 class="card-title text-center">
                        @if($xray->prediction)
                            حالة الالتهاب الرئوي {{$xray->prediction}}
                        @else
                          اشعة المريض
                        @endif
                      </h4>
                    </div>
                   
                  </figure>
                </div>
              </div>
            </div>
           
          </div>
    </div>
</div>    
@endsection