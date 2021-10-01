@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    {{Auth::user()->name}}
                    <h1>Admin</h1>
                    <h4>index</h4>
                    <a href="{{route('admin.create-review')}}">create Review</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
