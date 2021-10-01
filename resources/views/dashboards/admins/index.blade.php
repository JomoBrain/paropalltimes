@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
               <div class="px-4">
                @if (Session('success'))
                <span class="alert alert-success">
                    {{Session("success")}}
                    
                </span>
                    
                @endif
               </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                  
                    
                    <h4>You are an admin <a href="/" class="btn btn-sm btn-success">Home page</a></h4>


                    
                   <section>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

                        <div class="container">
                         <ul class="navbar-nav">
                             <li class="nav-item">
                                 <a href="#review" class="nav-link active">
                                     Reviews
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#team" class="nav-link active">
                                  team members
                               </a>
                           </li>
                           <li class="nav-item">
                            <a href="#service" class="nav-link active">
                               Services
                           </a>
                       </li>
                       <li class="nav-item">
                        <a href="#blog" class="nav-link active">
                          blogs
                       </a>
                   </li>
                         </ul>

                        </div>

                    </nav>
                   
                   </section>


                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mt-3">

                        <div class="container">
                         <ul class="navbar-nav">
                             <li class="nav-item">
                                 <a href="{{route('admin.create-review')}}" class="nav-link active">
                                    create Review
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.create-team')}}" class="nav-link active">
                                  Add a team member
                               </a>
                           </li>
                           <li class="nav-item">
                            <a href="{{route('admin.create-service')}}" class="nav-link active">
                               Add a service
                           </a>
                       </li>
                       <li class="nav-item">
                        <a href="{{route('admin.create-blog')}}" class="nav-link active">
                          create blog
                       </a>
                   </li>
                         </ul>

                        </div>

                    </nav>
                    

                   
                    
                    <h3 class="text-center text-primary" id="blog">Blogs</h3>
                   <h3 class="text-center">
                    <a href="{{route('admin.create-blog')}}" class="btn btn-primary text-center">
                        create blog
                     </a>
                   </h3>
                          <section class="row mb-3">
                              
                            @foreach ((App\Models\Blog::orderBy('created_at','desc')->get()) as $b)
                            @if (isset(Auth::user()->id) && Auth::user()->id==$b->user_id)
                              <div class="col-lg-6 mb-2">
                                  <div class="card px-3 py-2">
                                      <div class="card-title">
                                          <h3 class="px-2 py-1">{{$b->title}}</h3>
                                          <section>
                                              <img src="/blogImages/{{$b->image}}" alt="" class="img-fluid">
                                          </section>
                                      </div>
                                      <div>
                                          {{$b->body}}
                                      </div>
                                      <div class="btnAdmin">
                                        <a href="/admin/edit-blog/{{$b->id}}" class="btn btn-warning">edit</a>
                                        <a href="/admin/delete-blog/{{$b->id}}" class="btn btn-danger">delete</a>
                                      </div>
                                  </div>
                              </div>
                               
                                    @endif
                                    @endforeach
                          </section>
                    
                          <main>
                            <h3 class="text-center text-primary" id="review">Reviews</h3>
                            <h3 class="text-center">
                                <a href="{{route('admin.create-review')}}" class="btn btn-primary text-center">
                                   add a review
                                 </a>
                               </h3>
                            <section class="row mb-3">
                                
                              @foreach ((App\Models\Review::orderBy('created_at','desc')->get()) as $b)
                              @if (isset(Auth::user()->id) && Auth::user()->id==$b->user_id)
                                <div class="col-lg-6 mb-3">
                                    <div class="card px-3 py-2">
                                        <div class="card-title">
                                            <h4 class="px-2 py-1">{{$b->name}}</h4>
                                            <section>
                                                <img src="{{$b->image}}" alt="" class="img-fluid">
                                            </section>
                                        </div>
                                        <div>
                                            {{$b->message}}
                                        </div>
                                        <div class="btnAdmin">
                                          <a href="/admin/edit-review/{{$b->id}}" class="btn btn-warning">edit</a>
                                          <a href="/admin/delete-review/{{$b->id}}" class="btn btn-danger">delete</a>
                                        </div>
                                    </div>
                                </div>
                                 
                                      @endif
                                      @endforeach
                            </section>
                     
                          </main>



                          <main>
                            <h3 class="text-center text-primary" id="team">Team Members</h3>
                            <h3 class="text-center">
                                <a href="{{route('admin.create-team')}}" class="btn btn-primary text-center">
                                   add team member
                                 </a>
                               </h3>
                            <section class="row mb-3">
                                
                              @foreach ((App\Models\Team::orderBy('created_at','desc')->get()) as $b)
                              @if (isset(Auth::user()->id) && Auth::user()->id==$b->user_id)
                                <div class="col-lg-6 mb-3">
                                    <div class="card px-3 py-2">
                                        <div class="card-title">
                                            <h4 class="px-2 py-1">{{$b->name}}</h4>
                                            <section>
                                                <img src="/teamImages/{{$b->image}}" alt="" class="img-fluid">
                                            </section>
                                        </div>
                                        <div>
                                            {{$b->about}} <br>
                                            <small>

                                               {{$b->role}} 
                                            </small>
                                        </div>
                                        <div class="btnAdmin">
                                          <a href="/admin/edit-team/{{$b->id}}" class="btn btn-warning">edit</a>
                                          <a href="/admin/delete-team/{{$b->id}}" class="btn btn-danger">delete</a>
                                        </div>
                                    </div>
                                </div>
                                 
                                      @endif
                                      @endforeach
                            </section>
                     
                          </main>

                          <main>
                            <h3 class="text-center text-primary" id="service">Services</h3>
                            <h3 class="text-center">
                                <a href="{{route('admin.create-service')}}" class="btn btn-primary text-center">
                                   add service
                                 </a>
                               </h3>
                            <section class="row mb-3">
                               @if (count(App\Models\Service::orderBy('created_at','desc')->get())>0)
                                   
                               
                              @foreach ((App\Models\Service::orderBy('created_at','desc')->get()) as $b)
                              @if (isset(Auth::user()->id) && Auth::user()->id==$b->user_id)
                                <div class="col-lg-6 mb-3">
                                    <div class="card px-3 py-2">
                                        <div class="card-title">
                                            <h4 class="px-2 py-1">{{$b->title}}</h4>
                                            <section>
                                                <img src="{{$b->image}}" alt="" class="img-fluid">
                                            </section>
                                        </div>
                                        <div>
                                            {{$b->services}} <br>
                                            
                                        </div>
                                        <div class="btnAdmin">
                                          <a href="/admin/edit-service/{{$b->id}}" class="btn btn-warning">edit</a>
                                          <a href="/admin/delete-service/{{$b->id}}" class="btn btn-danger">delete</a>
                                        </div>
                                    </div>
                                </div>
                                 
                                      @endif
                                      @endforeach
                                      @else
                                      <h3 class="text-center">You have not added any service</h3>
                                      <a href="{{route('admin.create-service')}}" class="btn btn-primary">Click to add service</a>
                                      @endif
                            </section>
                     
                          </main>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
