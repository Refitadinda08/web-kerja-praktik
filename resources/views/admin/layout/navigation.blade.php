<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('assets/img/sidebar-1.jpg') }}">
     
  <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
      Creative Tim
    </a></div>
    
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item active  ">
        <a class="nav-link" href="{{ route('index') }}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
</li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('daftar-pasien') }}">
        <i class="material-icons">person</i>
          <p>Daftar Pasien</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="./map.html">
          <i class="material-icons">location_ons</i>
          <p>Locasi Ps</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('laporan') }}">
          <i class="material-icons">notifications</i>
          <p>Laporan</p>
        </a>
      </li>
      
    </ul>
  </div>
</div>