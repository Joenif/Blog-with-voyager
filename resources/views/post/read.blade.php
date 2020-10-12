@extends('layouts.app')

@section('section')
    
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url({{ Voyager::image(image_format($post->image)) }});">
      <div class="container">
        <div class="row same-height justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
              <span class="post-category text-white bg-success mb-3">{{$post->category->name}}</span>
              <h1 class="mb-4">{{$post->title}}</h1>
              <div class="post-meta align-items-center text-center">
                <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="{{Voyager::image($post->user->avatar) ?? ''}}" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By {{$post->user->name}}</span>
                <span>&nbsp;-&nbsp; {{date('F j, Y', strtotime($post->created_at))}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries element-animate">
          
          <div class="col-md-12 col-lg-8 main-content">
            
            <div class="post-content-body">
              <div>
                <a href="{{url()->previous()}}" class="btn btn-secondary py-2 mb-2"> Go Back </a>
                {!! $post->body !!}
              </div>
            </div>
            
            <div class="pt-5">
              Tags: <a href="#">#manila</a>, <a href="#">#asia</a></p>
            </div>

            <div class="pt-5">
              <h3 class="mb-5">Comments</h3>
              <ul class="comment-list">
                <li class="comment">
                  <div class="vcard">
                    <img src="/images/person_1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>Jean Doe</h3>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply rounded">Reply</a></p>
                  </div>
                </li>
              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="#" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" id="website">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn btn-primary">
                  </div>

                </form>
              </div>
            </div>

          </div>

          <!-- END main-content -->

          <div class="col-md-12 col-lg-4 sidebar">
            <div class="sidebar-box">
              <form action="{{route('search')}}" method='post' class="search-form">
                {{csrf_field()}}
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" class="form-control" name="q" id="s" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <!-- END search sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Popular Posts</h3>
              <div class="post-entry-sidebar">
                <ul>
                @foreach ($f_posts as $posts)
                    <li>
                    <a href="">
                      <img src="{{ Voyager::image(image_format($posts->image, 'small')) }}" alt="Image placeholder" class="mr-4">
                      <div class="text">
                        <h4>{{$posts->title}}</h4>
                        <div class="post-meta">
                          <span class="mr-2"> {{date('F j, Y', strtotime($posts->created_at))}} </span>
                        </div>
                      </div>
                    </a>
                  </li>
                @endforeach
                </ul>
              </div>
            </div>
            <!-- END Popular-posts sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Categories</h3>
              <ul class="categories">
                @php
                  $allCategories = new App\Category;
                  $allCategory = $allCategories->all();
                @endphp
                @foreach ($allCategory as $category)
                  <li><a href="{{route('category', $category->slug)}}">{{$category->name}} <span>({{count($category->categoryPosts())}})</span></a></li>
                @endforeach
              </ul>
            </div>
            <!-- END Category sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Tags</h3>
              <ul class="tags">
                <li><a href="#">Travel</a></li>
                <li><a href="#">Adventure</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Freelancing</a></li>
                <li><a href="#">Travel</a></li>
                <li><a href="#">Adventure</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Freelancing</a></li>
              </ul>
            </div>
          </div>
          <!-- END Tags sidebar -->

        </div>
      </div>
    </section>

    <div class="site-section bg-light">
      <div class="container">

        <div class="row mb-5">
          <div class="col-12">
            <h2>More Related Posts</h2>
          </div>
        </div>

        <div class="row align-items-stretch retro-layout">

          @php
            $postCategory = $allCategories->find($post->category->id);
            $r_posts = $postCategory->categoryPosts();
          @endphp

          @foreach ($r_posts as $r_post)
            @if ($r_post->id != $post->id)
              <div class="col-md-4">
              
                {{-- <div class="two-col d-block d-md-flex"> --}}
                  <a href="single.html" class="hentry v-height img-2 gradient" style="background-image: url('/images/img_2.jpg');">
                    <span class="post-category text-white bg-primary">{{$r_post->category->name}}</span>
                    <div class="text text-sm">
                      <h2>{{$r_post->title}}</h2>
                      <span>{{date('F j, Y', strtotime($r_post->created_at))}}</span>
                    </div>
                  </a>
                {{-- </div>   --}}

              </div>    
            @endif
            
          @endforeach
        </div>

      </div>
    </div>


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