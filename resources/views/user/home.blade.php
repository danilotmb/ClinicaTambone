<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <meta name="copyright" content="MACode ID, https://macodeid.com/">
  
    <title fot>Clinica Rossi</title>
  
    <link rel="stylesheet" href="../assets/css/maicons.css">
  
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
  
    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">
  
    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">
  
    <link rel="stylesheet" href="../assets/css/theme.css">
  
    <link rel="stylesheet" href="../assets/css/logo-styles.css">
    
    <link rel="icon" href="{{ asset('assets/img/logo/logo.ico') }}" type="image/x-icon">

  
  </head>
<body>

  <div class="back-to-top"></div>

  @include('user.navbar')

  @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert"> x </button>
                    {{session()->get('message')}}
                </div>
  @endif

  <div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">Let's make your life happier</span>
        <h1 class="display-4">Healthy Living</h1>
      </div>
    </div>
  </div>


  <div class="bg-light">
    <div class="page-section py-3 mt-md-n5 custom-index">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-secondary text-white">
                <span class="mai-chatbubbles-outline"></span>
              </div>
              <p><span>Chat</span> with a doctors</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-primary text-white">
                <span class="mai-shield-checkmark"></span>
              </div>
              <p>Protection</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-accent text-white">
                <span class="mai-basket"></span>
              </div>
              <p>Pharmacy</p>
            </div>
          </div>
        </div>
      </div>
    </div> 

    @include('user.info')
  </div> 

  <div id="doctor-section">
  
    @include('user.doctor')
</div>

<div id="news-section">
  
  @include('user.news')
</div>

<div id="appointment-section">
  
  @include('user.appointment')
</div>

  @include('user.banner')

  @include('user.footer')

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>