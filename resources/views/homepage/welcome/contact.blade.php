<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </header>

      <div class="row gy-4">

        <div class="col-lg-6">

          <div class="row gy-4">
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p>Kilifi Mtwapa,<br>Mtwapa</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p><a href="tel:+254725451457">+254725451457</a><br><a href="tel:+254700044443">+254700044443</a></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>paropalltimes21@gmail.com<br>paropalltimes21@gmail.com</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-clock"></i>
                <h3>Open Hours</h3>
                <p>Monday - Sartuday<br>8:00AM - 05:00PM</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">
          <form action="{{route('sendmail')}}" method="post" class="php-email-form" enctype="multipart/form-data">
            @csrf
            <div>
              
             </div>
            <div class="row gy-4">
              

              <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
              </div>

              <div class="col-md-6 ">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
              </div>

              <div class="col-md-12">
                <input type="text" class="form-control" value="Contacting Parop" name="subject" placeholder="Subject" required>
              </div>

              <div class="col-md-12">
                <textarea style="resize: none;" class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
              </div>

              <div class="col-md-12 text-center">
                @if (Session('msg'))
                <div class="sent-message">                 
                  <span class="alert alert-success">
                    {{Session("msg")}}
                  </span>
                  @endif
                </div>
                

                <button type="submit">Send Message</button>
              </div>

            </div>
          </form>

        </div>

      </div>

    </div>

  </section><!-- End Contact Section -->
