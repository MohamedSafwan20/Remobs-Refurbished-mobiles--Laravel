
<nav class="navbar navbar-expand-lg navbar-dark bg-primary p-3 d-flex justify-content-between">
    <a class="navbar-brand fs-3 text-secondary" href="#">Remobs</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" >
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="d-none d-lg-block">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor" class="bi bi-search pb-1" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
          </button>
        </div>
      </div>
    </form>
    <div class="d-none d-lg-block">
      <ul class="navbar-nav mr-auto">
      @auth
        <li class="nav-item px-3">
          <a class="nav-link" href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag text-white" viewBox="0 0 16 16">
              <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
            </svg>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href={{ route('register')}}>Log out</a>
        </li>
        @endauth
        @guest
        <li class="nav-item">
          <a class="nav-link" href={{ route('register')}}>Signup</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href={{ route('login')}}>Login</a>
        </li>
        @endguest
      </ul>
    </div>
  </nav>

  {{-- Mobile nav bar menu --}}
  <div class="collapse navbar-collapse bg-primary text-center p-2" id="navbarSupportedContent">
    <ul class="navbar-nav">
      @auth
      <li class="nav-item my-2">
        <a class="nav-link" href="">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag text-white" viewBox="0 0 16 16">
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
          </svg>
        </a>
      </li>
      <li class="nav-item my-2">
        <a class="nav-link text-white" href={{ route('register')}}>Log out</a>
      </li>
      @endauth
      @guest       
      <li class="nav-item my-1">
        <a class="nav-link text-white" href={{ route('register')}}>Signup</a>
      </li>
      <li class="nav-item my-1">
        <a class="nav-link text-white" href={{ route('login')}}>Login</a>
      </li>
      @endguest
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor" class="bi bi-search pb-1" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
          </button>
        </div>
      </div>
    </form>
</div>
