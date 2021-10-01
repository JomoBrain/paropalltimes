@extends('layouts.app')

@section('content')
<link href="assets/css/style.css" rel="stylesheet">
<style>
    @media(min-width:440px){
        .bx{
        /* border: 1px solid grey; */
        padding: 10px 10px;
        background: #F8FAFC;
        box-shadow: -3px -3px 7px #F8FAFC,3px 3px 5px #ceced1;
    }
    }
    @media(max-width:440px){
        .bx{
        border: 1px solid red;
        padding: 10px 5px;
        }
        .h2{
            display: block;
        }
    }
    img:hover{
        transform: translateY(5px);
    }
</style>
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

                    
                    Welcome: <small><b>{{Auth::user()->name}}</b></small>
                    
                    
                   
                    
                    
                    @include('homepage.welcome.blog')
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
