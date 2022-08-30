<nav class="navbar navbar-expand-lg navbar-dark bg-black"id="bg-black">
  <div class="container">
    <a class="navbar-brand" href="{{url('/')}}" style="color:grey;font-weight:900">EgbonTech</a>
    <div class="search">
      <form action="{{url('search-products')}}"method="POST">
        @csrf
      <div class="input-group ">
        <button class="input-group-text" type="submit"style="background:#186"><i class="fas fa-search"style="cursor:pointer;color:white"></i></button>
        <input type="search" class="form-control"id="search" placeholder="Search Products" aria-label="Username" aria-describedby="basic-addon1"name="product_name"required>
      </div>
    </form>
    </div>

    @if(Auth::check())
    <a class="navbar-brand" href="{{url('cart')}}"id="cart2">Cart
      <span class="badge badge-pill cart-count"style="background:#185">0</span>
    </a>
    @endif
    <button style="background:#185"class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{url('/')}}">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{url('category')}}">Shop</a>
        </li>



        @if(!Auth::check())
        <li class="nav-item">
          <a class="nav-link " href="{{ route('login') }}">Login</a>
        </li>
        @endif
        @if(Auth::check())
        @if (Auth::user()->role_as == 1)
        <li class="nav-item">
            <a class="nav-link " href="{{url('admin/dashboard')}}">Admin</a>
          </li>
        @endif



      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> {{ Auth::user()->name }}</a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

            <li><a class="dropdown-item" href="{{route('logout')}}"onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"  >Logout</a></li>


              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <li class=" nav-item dropdown">
              <a class="dropdown-item" href="{{url('order-detials')}}">My Orders</a>
            </li>
        </ul>
    </li>
  </ul>
  <a class="navbar-brand" href="{{url('cart')}}"id="cart1">Cart
  <span class="badge badge-pill cart-count"style="background:#185;height:24px">0</span>
</a>

      @endif



  </div>
</nav>
