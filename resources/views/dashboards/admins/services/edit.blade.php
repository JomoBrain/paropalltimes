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
          <h1 class="text-center">Edit</h1>
            <form method="POST" action="{{route('admin.update-service')}}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$service->id}}">
              <div class="mb-3">
                @if (Session::has('success'))
              <span class="alert alert-success">
                {{Session::get('success')}}
              </span>
              </div>
                  
              @endif
              <div class="mb-3">
                <label for="">Enter title</label>
              <input type="text" class="form-control" name="title" value="{{$service->title}}">
              @error('title')
                  <span class="text-danger">
                    {{$message}}
                  </span>
              @enderror
              
            </div>
            

            

              <div class="mb-3">
                <label for="">Services</label>
              <textarea  name="services" cols="30" rows="10" class="form-control" >
                {{$service->services}}
              </textarea>
              @error('services')
                  <span class="text-danger">
                    {{$message}}
                  </span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="">Select image</label> <br>
              <input type="file" class="form-control pb-5 pt-4" name="image">
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