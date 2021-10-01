
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Services</h2>
          <p>We Offer the following Services</p>
        </header>

        <div class="row gy-4">

          @foreach (App\Models\Service::orderBy('created_at','desc')->get()   as $s)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box blue " id="serve">
              {{-- <i class="ri-discuss-line icon"></i> --}}
              <small><img src="/serviceImages/{{$s->image}}" alt="" srcset=""  style="width: 100px;height:100px;border-radius:10px;" class="mb-2"></small>
              <h3>{{$s->title}}</h3>
            
              @foreach(explode(',', (\Illuminate\Support\Str::limit($s->services, 90))) as $fields) 
              <li class="link">{{$fields}}</li>
               @endforeach
              <a href="{{route('admin.all-services')}}" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          @endforeach

          
        </div>

      </div>

    </section><!-- End Services Section -->