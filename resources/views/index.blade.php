@extends('layouts.app')

@section('section')

    <section class="site-section bg-light">
      <div class="container-fluid">
        <div class="row align-items-stretch retro-layout-2">
        
          @php
            $item1 = array_slice($f_posts, 0, 2);  // gives first 2 items
            $item2 = array_slice($f_posts, 2, 1);  // gives the third item
            $item3 = array_slice($f_posts, 3, 2); // gives next 2 items
          @endphp
        
          <div class="col-md-4">
            @if (!empty($item1))
              @foreach ($item1 as $post)

                <a href="{{route('readPost', $post['slug'] )}}" class="h-entry mb-30 v-height gradient" style="background-image: url({{ Voyager::image(image_format($post['image'], 'cropped')) }})">
                  
                  <div class="text">
                    <h2>{{$post['title']}}</h2>
                    <span class="date">{{ date('F j, Y', strtotime($post['created_at'])) }}</span>
                  </div>
                </a>
              @endforeach
            @endif
          </div>

          <div class="col-md-4">
            @if (!empty($item2))
              <a href="{{route('readPost', $item2[0]['slug'] )}}" class="h-entry img-5 h-100 gradient" style="background-image: url({{ Voyager::image(image_format($item2[0]['image'], 'cropped')) }})">
                
                <div class="text">
                  <div class="post-categories mb-3">
                    <span class="post-category bg-danger">{{$item2[0]['category']['name']}}</span>
                    <span class="post-category bg-primary">Food</span>
                  </div>
                  <h2>{{$item2[0]['title']}}</h2>
                  <span class="date">{{ date('F j, Y', strtotime($post['created_at'])) }}</span>
                </div>
              </a>
            @endif
          </div>

          <div class="col-md-4">
            @if (!empty($item3))
              @foreach ($item3 as $post)
                <a href="{{route('readPost', $post['slug'] )}}" class="h-entry mb-30 v-height gradient" style="background-image: url({{ Voyager::image(image_format($post['image'], 'cropped')) }})">
                  
                  <div class="text">
                    <h2>{{$post['title']}}</h2>
                    <span class="date">{{ date('F j, Y', strtotime($post['created_at'])) }}</span>
                  </div>
                </a>
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <h2>Recent Posts</h2>
          </div>
        </div>
        <div class="row">
          @foreach ($p_posts as $post)
                
            @include('post.post-grid')
              
          @endforeach
          
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
      </div>
    </section>

    <div class="site-section bg-lightx">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-5">
            <div class="subscribe-1 ">
              <h2>Subscribe to our newsletter</h2>
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
              <form action="#" class="d-flex">
                <input type="text" class="form-control" placeholder="Enter your email address">
                <input type="submit" class="btn btn-primary" value="Subscribe">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection