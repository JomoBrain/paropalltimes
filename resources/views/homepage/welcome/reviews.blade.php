
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Testimonials</h2>
          <p>What they are saying about us</p>
        </header>

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="200">
          <div class="swiper-wrapper">
           
            @foreach (App\Models\Review::orderBy('created_at','desc')->get() as $r)
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                 {{$r->message}}
                </p>
                <div class="profile mt-auto">
                  <img src="/reviewImages/{{$r->image}}" class="testimonial-img" alt="">
                  <h3>{{$r->name}}</h3>
                  <h4>{{$r->occupation}}</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            @endforeach

           
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- End Testimonials Section -->