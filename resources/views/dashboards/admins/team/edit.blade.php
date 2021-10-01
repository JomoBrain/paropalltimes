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
            <form method="POST" action="{{route('admin.update-team')}}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$team->id}}">
              <div class="mb-3">
                @if (Session::has('success'))
              <span class="alert alert-success">
                {{Session::get('success')}}
              </span> &nbsp;&nbsp;
              <span>
                <a href="/#team" class="btn btn-primary">  go to homepage to view
                </a>
              </span>
              </div>
                  
              @endif
              <div class="mb-3">
                <label for="">Enter name</label>
              <input type="text" class="form-control" name="name" value="{{$team->name}}">
              @error('name')
                  <span class="text-danger">
                    {{$message}}
                  </span>
              @enderror
              
            </div>
            

              <div class="mb-3">
                  <label for="">Role</label>
                  <input type="text" class="form-control" name="role" value="{{$team->role}}">
                  @error('role')
                  <span class="text-danger">
                    {{$message}}
                  </span>
              @enderror
              </div>

              <div class="mb-3">
                <label for="">About</label>
              <textarea name="about" id="" cols="30" rows="10" class="form-control" name="about" value="">{{$team->about}}</textarea>
              @error('about')
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