@if(session()->has('user'))

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('home')}}">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="dropdown-item text-white" href="{{route('seller.dashboard')}}">Dashboard <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="dropdown-item text-white" href="{{route('posts.list')}}">Posts</a>
        </li>
        <li class="nav-item">
          <a class="dropdown-item text-white" href="{{route('seller.orders')}}">My Orders</a>
        </li>
        <li class="nav-item">
          <a class="dropdown-item text-white" href="{{route('seller.bids')}}">Current Bids</a>
        </li>
        <li class="nav-item">
          <a class="dropdown-item text-white" href="{{route('seller.profile')}}">Profile</a>
        </li>
        <li class="nav-item">
          <a class="dropdown-item text-white" href="{{route('seller.logout')}}">Logout</a>
        </li>
        
      </ul>
    </div>
    <form class="form-inline pull-right">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </div>
        <div class="col-md-7">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </div>
      </div>
    </div>
      </form>
  </nav>
  @endif