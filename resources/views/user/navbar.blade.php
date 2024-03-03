<header>
  <div class="topbar">
      <div class="container">
          <div class="row">
              <div class="col-sm-8 text-sm">
                  <div class="site-info">
                      <a href="#"><span class="mai-call text-primary"></span> +39 080994567</a>
                      <span class="divider">|</span>
                      <a href="#"><span class="mai-mail text-primary"></span>info@clinicarossi.it</a>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
          <a class="navbar-brand" href="/home">
              <img src="{{ asset('assets/img/logo/logo.ico') }}" alt="Clinica Rossi Logo" height="60" class="mr-2">
              <span class="text-primary">Clinica</span>-Rossi
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
              aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupport">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="{{ url('/')}}">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="home#doctor-section">Doctors</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="home#news-section">News</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="home#appointment-section">Make An Appointment</a>
                  </li>

                  @auth
                  <li class="nav-item">
                      <a class="nav-link btn btn-primary font-weight-bold" href="{{ url('myappointment') }}"
                          style="background-color: #00D9A5; color: white;">
                          My Appointment
                      </a>
                  </li>
                  <li class="nav-item" style="margin-left: 10px;">
                      <a class="nav-link btn btn-primary font-weight-bold" href="{{ url('user/profile') }}"
                          style="background-color: #00D9A5; color: white;">Profile</a>
                  </li>
                  <li class="nav-item">
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <button type="submit" class="btn btn-primary ml-lg-3">Logout</button>
                      </form>
                  </li>
                  @else
                  <li class="nav-item">
                      <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
                  </li>

                  <li class="nav-item">
                      <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Registrati</a>
                  </li>
                  @endauth

              </ul>
          </div> 
      </div> 
  </nav>
</header>
