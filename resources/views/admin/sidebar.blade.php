<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <style>
        .brand-text {
            font-family: 'Arial', sans-serif;
            font-size: 22px;
            font-weight: bold;
            color: #ffffff; 
            margin: 10; 
        }
        .brand-container {
    display: flex;
    align-items: center; 
    text-decoration: none;
}

.logo-icon {
    width: 50px; 
    height: auto; 
    margin-right: 10px; 
}

    


    </style>

<a href="/" class="brand-container">
  <img src="{{ asset('assets/img/logo/logo.ico') }}" alt="Logo" class="logo-icon">
  <span class="brand-text">Clinica Admin Dashboard</span>
</a>
</div>

    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            
          </div>
          
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('add_doctor_view')}}">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Add Doctors</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('show_appointments')}}">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Appointmentes</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('show_doctors')}}">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Doctors</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('show_clients')}}">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Clients</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('add_visit')}}">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Exam</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('show_report')}}">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Report</span>
        </a>
      </li>
      
    </ul>
  </nav>