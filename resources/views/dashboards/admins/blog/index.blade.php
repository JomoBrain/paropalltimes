@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body>
        
        <div class="container">
           
                
           
        <section class="text-center">
            <h6 style="color: #a6a7aa">blog</h6>
            <h1 style="color: #204381">All the blogs</h1>
        </section>
          <div class="row">
            @if (count($blogs)>0)
              @foreach ($blogs as $b)
              <div class="col-md-4 text-center ">
                  <div class="card py-3 mb-3 px-3">
                    <div class="post-box">
                      <h3 class="post-title">{{$b->title}}</h3>
                      <div class="post-img"><img src="/blogImages/{{$b->image}}" class="img-fluid" alt=""></div>
                      <span class="post-date">created on:{{date('jS M Y',strtotime($b->created_at))}} </span>
                      
                      
                      
                     
                      <p>{{Illuminate\Support\Str::limit($b->body,90)}}</p>
                      <a href="/admin/single-blog/{{$b->id}}" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                    </div> 
                      <div>
                          @if (isset(Auth::user()->id) && Auth::user()->id==$b->user_id)
                          
                          <a href="/admin/edit-blog/{{$b->id}}" class="btn btn-warning">edit</a>
                          <a href="/admin/delete-blog/{{$b->id}}" class="btn btn-danger">delete</a>
                              
                          @endif
                      </div>
                  </div>
              </div>
                  
              @endforeach
              <div>
                {{ $blogs->links() }}
              </div>
              @else
              <div class="text-center">
                <h4 class="text-center">Sorry no blog added</h4>
              </div>
              @endif

          </div>

        
        </div>
    </body>
    </html>
@endsection