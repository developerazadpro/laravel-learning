<nav class="navbar navbar-expand-lg bg-body-tertiary navar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('customers.index') }}">Customers</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('orders.index') }}">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('file')  }}">File</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('locale', ['locale' => 'en']) }}">English</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('locale', ['locale' => 'dk']) }}">Danish</a>
          </li>
          
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>        
      </div>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">          
          @if (Route::has('login'))              
              @auth
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-success">logout</button>
                  </form>                  
              @else
                <a class="nav-link" aria-current="page" href="{{ route('login') }}">Login</a>

                  @if (Route::has('register'))
                      <a class="nav-link" aria-current="page" href="{{ route('register') }}">Register</a>
                  @endif
              @endauth              
          @endif
      </ul>
    </div>
  </nav>
  <header class="w3-container w3-center w3-padding-32">
    <h1><b>WELCOME TO {{ $name ?? 'SARA\'S' }} BLOG</b></h1>
    <p>Welcome to the blog of <span class="w3-tag">unknown</span></p>
</header>
