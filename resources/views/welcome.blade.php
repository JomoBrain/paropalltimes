
  @include('homepage.welcome.header')
  <div class="col-md-12 text-center">
    @if (Session('msg'))
    <div class="sent-message">                 
      <span class="alert alert-success">
        {{Session("msg")}}
      </span>
      @endif
    </div>
    
  @include('homepage.welcome.hero')
  @include('homepage.welcome.about')
  <main id="main">
   

    @include('homepage.welcome.services')
    @include('homepage.welcome.reviews')
    @include('homepage.welcome.team')
    @include('homepage.welcome.blog')
    @include('homepage.welcome.contact')
    
  </main><!-- End #main -->
  @include('homepage.welcome.footer')
  
  