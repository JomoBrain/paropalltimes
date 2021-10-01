
    <!-- ======= Team Section ======= -->
    <section id="team" class="team">

        <div class="container" data-aos="fade-up">
  
          <header class="section-header">
            <h2>Team</h2>
            <p>Our hard working team</p>
          </header>
  
          <div class="row gy-4">
  
            @foreach (App\Models\Team::orderBy('created_at','desc')->get() as $t)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="member">
                <div class="member-img">
                  <img src="/teamImages/{{$t->image}}" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>{{$t->name}}</h4>
                  <span>{{$t->role}}</span>
                  <p>{{$t->about}}</p>
                </div>
              </div>
            </div>
    @endforeach
  
          </div>
        
        </div>
  
      </section><!-- End Team Section -->