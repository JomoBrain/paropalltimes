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
        <div class="row">
            <div class="text-center">
                <div class="row">
                    <h1 class="text-center col-md-12 ml-5 pl-5" style="text-align: center">{{$blog->title}}</h1>
                    
                </div>
            </div>
            <div class="col-md-9 mb-3 offset-md-2">
                <img src="/blogImages/{{$blog->image}}" alt="blog_image " class="text-center img-fluid px-5 " style="border-radius: 60px">
            </div>

            <h1 class="text-center col-md-12 ml-5 pl-5 fw-bold" style="font-weight: bold">{{$blog->title}}</h1>
            {{-- <h6>Created by <small style="font-weight: 600">{{$blog->user->name}}</small></h6> --}}
        </div>
        <div class="row">
            <div class="col-md-12 px-3">
                <p class="px-4 fw-bold" style="font-weight: 400">
                    {{$blog->body}}
                </p>
                <div class="mt-3 px-5">
                    <div class="d-flex justify-content-between align-content-between">
                        @if (isset(Auth::user()->id) && Auth::user()->id==$blog->user_id)
                    {{-- <a href="/admin/single-blog/{{$blog->id}}" class="btn btn-success">view</a> --}}
                    <a href="/admin/edit-blog/{{$blog->id}}" class="btn btn-warning">edit</a>
                    <a href="/admin/delete-blog/{{$blog->id}}" class="btn btn-danger">delete</a>
                        
                    @endif
                    </div>
                </div>
            </div>
            <p class="text-left">created on <b>{{date('jS M Y',strtotime($blog->created_at))}}</b> </p>
        </div>
        
    </div>
</body>
</html>

    
@endsection