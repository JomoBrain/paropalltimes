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
            <h6 style="color: #8793f6">Team</h6>
            <h1 style="color: #204381">Our hard working team</h1>
        </section>
          <div class="row">
            @if (count($teams)>0)
              @foreach ($teams as $team)
              <div class="col-md-3 text-center ">
                  <div class="card py-3 mb-3 px-3">
                    <img src="/teamImages/{{$team->image}}" alt="team_image " class="text-center img-fluid">
                    <h5 class="card-title">{{$team->name}}</h5>
                    <h6 class="text-secondary">

                        {{$team->role}}
                      </h6>

                      <h3 style="color: orange">&#10031;&#10031;&#10031;&#10031;&#10031;</h3>
                      <p>{{$team->about}}</p>
                      
                      
                     
                      <div>
                          @if (isset(Auth::user()->id) && Auth::user()->id==$team->user_id)
                          {{-- <a href="/admin/single-team/{{$team->id}}" class="btn btn-success">view</a> --}}
                          <a href="/admin/edit-team/{{$team->id}}" class="btn btn-warning">edit</a>
                          <a href="/admin/delete-team/{{$team->id}}" class="btn btn-danger">delete</a>
                              
                          @endif
                      </div>
                  </div>
              </div>
                  
              @endforeach
              @else
              <div class="text-center">
                <h4 class="text-center">Sorry no team member added</h4>
              </div>
              @endif

          </div>

        
        </div>
    </body>
    </html>
@endsection