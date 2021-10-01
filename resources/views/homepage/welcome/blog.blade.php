<!-- ======= Recent Blog Posts Section ======= -->
<section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2 class="h2" style="display:flex;justify-content:space-between;align-items:center;padding:5px 40px">
          <span>Blog</span>
       
        </h2> 
        <p>Recent blog posts</p>
      </header>

      <div class="row">
        @foreach (App\Models\Blog::orderBy('created_at','desc')->paginate(6) as $b)
        <div class="col-lg-4 mb-2">
          <div class="post-box bx">
            <div class="post-img"><img src="/blogImages/{{$b->image}}" class="img-fluid" alt=""></div>
            <span class="post-date text-primary fw-bold">created at:{{date('jS M Y',strtotime($b->created_at))}} </span>
            
            <h3 class="post-title">{{$b->title}}</h3>
           
            <p>{{Illuminate\Support\Str::limit($b->body,90)}}</p>
            <a href="/admin/single-blog/{{$b->id}}" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
        @endforeach

        

      

      </div>

    </div>

  </section><!-- End Recent Blog Posts Section -->
