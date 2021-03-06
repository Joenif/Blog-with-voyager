@extends('layouts.app')

@section('section')

    <section class="site-section bg-white">
      <div class="container">
        <div class="row">
        @if($posts->isNotEmpty())
          @foreach ($posts as $post)
            
                <div class="col-lg-4 mb-4 hover-shadow">
                    <div class="entry2">
                        <a href="{{route('readPost', $post->slug)}}">
                            <img src="{{ Voyager::image(image_format($post->image, 'cropped')) }}" alt="Image" class="py-3 post-thumbnail img-fluid rounded">
                        </a>
                        <div class="excerpt">
                            <span class="post-category text-white bg-secondary mb-3">{{$post->category->name}}</span>
                            <h2><a href="{{route('readPost', $post->slug)}}">{{ $post->title }}</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{Voyager::image($post->user->avatar) ?? ''}}" alt="Image" class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">{{$post->user->name}}</a></span>
                                <span>&nbsp;-&nbsp; {{date('F j, Y', strtotime($post->created_at))}}</span>
                            </div>
                        </div>
                    </div>
            </div>
              
          @endforeach

        @endif

        </div>

        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            <div class="custom-pagination">
              <span>1</span>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <span>...</span>
              <a href="#">15</a>

              

            </div>
          </div>
      </div>
    </section>

@endSection