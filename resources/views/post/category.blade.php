@extends('layouts.app')

@section('section')

    <div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span>Category</span>
            <h3>{{$category->name}}</h3>
            {{-- <p>Category description here.. </p> --}}
          </div>
        </div>
      </div>
    </div>

    <section class="site-section bg-white">
      <div class="container">
        <div class="row">
        @if($posts->isNotEmpty())
          @foreach ($posts as $post)
            
            @include('post.post-grid')
              
          @endforeach
        
        @else

        <h3> No Posts </h3>

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

@endsection