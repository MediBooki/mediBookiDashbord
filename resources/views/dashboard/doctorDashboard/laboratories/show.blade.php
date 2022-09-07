@extends('layouts.app')
@section('title','page | patient X-Ray')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> صورة الاشعة </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.doctor')}}">{{ trans('main-sidebar.index') }}</a>
                            </li>
                            <li class="breadcrumb-item active">صورة التحاليل 
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
                    <a href="{{$laboratory->getFirstMediaUrl('photo')}}" itemprop="contentUrl" data-size="480x360">
                      <img class="gallery-thumbnail card-img-top" 
                            src="{{$laboratory->getFirstMediaUrl('photo')}}"
                            itemprop="thumbnail"
                            alt="Image description" />
                    </a>
                    <div class="card-body px-0 d-none">
                      <h4 class="card-title">Card title 1</h4>
                      <p class="card-text">This is a longer card with supporting text below.</p>
                    </div>
                   
                  </figure>
                </div>
              </div>
            </div>
           
          </div>
    </div>
</div>    
@endsection