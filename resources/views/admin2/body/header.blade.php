<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow-lg bg-body rounded m-0 p-0">
  <div class="container">
      <a href="#menu-toggle" class="toogle-icon" id="menu-toggle"><i class="fa fa-solid fa-bars"></i></a>
    <a class="navbar-brand" href="#"> <img src="{{asset("backend2/Image/water-logo.png")}}" alt="" width="40" height="60"> Water supply</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route("admin2.logout")}}"> <i class="fa fa-user"></i> Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa fa-gear"></i> settings</a>
        </li>

      </ul>
     
    </div>
  </div>
</nav>
