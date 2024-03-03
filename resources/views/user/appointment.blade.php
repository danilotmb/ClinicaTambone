<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" style="font-family: 'Open Sans', sans-serif; font-size: 2.5rem; color: #333;">Make an Appointment</h1>

        <form class="main-form" action="{{url('appointment')}}" method="POST">

            @csrf

            <div class="row mt-5">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ Auth::check() ? Auth::user()->name : '' }}">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="text" class="form-control" name="email" placeholder="Email Address.." value="{{ Auth::check() ? Auth::user()->email : '' }}">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="doctor" id="departement" class="custom-select">
                        <option value="" disabled selected>Select Doctor</option>
                        @foreach ($doctor as $doctors)
                            <option value="{{$doctors->name}}">{{$doctors->name}} - Speciality: {{$doctors->speciality}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input type="text" class="form-control" name="number" placeholder="Phone Number.." value="{{ Auth::check() ? Auth::user()->phone : '' }}">
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea name="message" id="message" name="message" class="form-control" rows="6" placeholder="Enter your message.."></textarea>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                  <button type="submit" class="btn btn-primary" style="background-color: #00D9A5;">Submit Request</button>
              </div>
              
            </div>
        </form>
    </div>
</div>
