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
          <h1 class="text-center">edit a review</h1>
            <form method="POST" action="{{route('admin.update-review')}}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$review->id}}">
              <div class="mb-3">
                @if (Session::has('success'))
              <span class="alert alert-success">
                {{Session::get('success')}}
              </span>
              </div>
                  
              @endif
              <div class="mb-3">
                <label for="">Enter name</label>
              <input type="text" class="form-control" name="name" value="{{$review->name}}">
              @error('name')
                  <span class="text-danger">
                    {{$message}}
                  </span>
              @enderror
              
            </div>
            <div class="mb-3">
                <label for="">Enter email</label>
                <input type="email" class="form-control" name="email" value="{{$review->email}}">
                @error('email')
                  <span class="text-danger">
                    {{$message}}
                  </span>
              @enderror
              </div>

              <div class="mb-3">
                  <label for="">Occupation</label>
                  <input type="text" class="form-control" name="occupation" value="{{$review->occupation}}">
                  @error('occupation')
                  <span class="text-danger">
                    {{$message}}
                  </span>
              @enderror
              </div>

              <div class="mb-3">
                <label for="">Message</label>
              <textarea name="message" id="" cols="30" rows="10" class="form-control" name="message" >{{$review->message}}</textarea>
              @error('message')
                  <span class="text-danger">
                    {{$message}}
                  </span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="">Select image</label> <br>
              <input type="file" class="form-control pb-5 pt-4" name="image" value="{{$review->image}}">
              @error('image')
                  <span class="text-danger">
                    {{$message}}
                  </span>
              @enderror
          </div>

          <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </body>
    </html>
@endsection