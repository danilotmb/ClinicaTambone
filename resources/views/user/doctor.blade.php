<div class="page-section">
  <div class="container">
    <h1 class="text-center mb-5 wow fadeInUp" style="font-family: 'Open Sans', sans-serif; font-size: 2.5rem; color: #333;">Explore Our Expert Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">

          @foreach ($doctor as $doctors)
              <div class="item">
                  <div class="card-doctor">
                      <div class="header">
                          <img src="doctor_image/{{$doctors->image}}" alt="{{$doctors->name}}" class="img-fluid">
                      </div>
                      <div class="body">
                          <p class="h4 mb-0">{{$doctors->name}}</p>
                          <span class="text-sm text-muted">{{$doctors->speciality}}</span>
                      </div>
                  </div>
              </div>
          @endforeach

      </div>
  </div>
</div>
