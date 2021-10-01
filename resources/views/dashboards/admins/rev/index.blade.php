@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        
        <div class="container">
           
                
           
        <section class="text-center">
            <h6 style="color: #8793f6">Testimonials</h6>
            <h1 style="color: #204381">What they are saying about us</h1>
        </section>
          <div class="row">
            @if (count($reviews)>0)
              @foreach ($reviews as $review)
              <div class="col-md-3 text-center">
                  <div class="card py-3 mb-3">
                      <h3 style="color: orange">&#10031;&#10031;&#10031;&#10031;&#10031;</h3>
                      <p>{{$review->message}}</p>
                      <h5 class="card-title">{{$review->name}}</h5>
                      <img src="/reviewImages/{{$review->image}}" alt="review_image " class="w-25 text-center" style="clip-path: circle(50% at 50% 50%);margin:0 auto;">
                      <h6 class="text-secondary">

                        {{$review->occupation}}
                      </h6>
                      <div>
                          @if (isset(Auth::user()->id) && Auth::user()->id==$review->user_id)
                          {{-- <a href="/admin/single-review/{{$review->id}}" class="btn btn-success">view</a> --}}
                          <a href="/admin/edit-review/{{$review->id}}" class="btn btn-warning">edit</a>
                          <a href="/admin/delete-review/{{$review->id}}" class="btn btn-danger">delete</a>
                              
                          @endif
                      </div>
                  </div>
              </div>
                  
              @endforeach
              @else
              <div class="text-center">
                <h4 class="text-center">Sorry no reviews added</h4>
              </div>
              @endif

          </div>

        
        </div>
    </body>
    </html>
@endsection