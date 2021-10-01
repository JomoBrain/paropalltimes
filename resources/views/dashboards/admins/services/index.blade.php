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
            <h6 style="color: #8793f6">services</h6>
            <h1 style="color: #204381">We offer the following services</h1>
        </section>
          <div class="row">
            <div class="mb-3">
              @if (Session::has('success'))
            <span class="alert alert-success">
              {{Session::get('success')}}
              @endif
            </span>
            </div>
            @if (count(array($services))>0)
            
                
            
              @foreach ($services as $service)
              <div class="col-md-3 text-center ">
                  <div class="card py-3 mb-3 px-3">
                    <img src="/serviceImages/{{$service->image}}" alt="services_image " class="text-center img-fluid">
                    <h5 class="text-secondary">

                        {{$service->title}}
                      </h5>
                   
                    

                     
                      <p>{{$service->services}}</p>
                      
                      
                     
                      <div>
                          @if (isset(Auth::user()->id) && Auth::user()->id==$service->user_id)
                          {{-- <a href="/admin/single-services/{{$service->id}}" class="btn btn-success">view</a> --}}
                          <a href="/admin/edit-service/{{$service->id}}" class="btn btn-warning">edit</a>
                          <a href="/admin/delete-service/{{$service->id}}" class="btn btn-danger">delete</a>
                              
                          @endif
                      </div>
                  </div>
              </div>
                  
              @endforeach
              @else
              <div class="text-center">
                <h4 class="text-center">Sorry no service added</h4>
              </div>
              @endif

          </div>

        
        </div>
    </body>
    </html>
@endsection