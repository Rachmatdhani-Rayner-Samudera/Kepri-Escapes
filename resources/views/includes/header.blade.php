
<header>
  {{-- nav container --}}
  <nav>
  <div class="nav container">
  <a href="/" class="logo">Kepri<span>Escapes</span></a>

  <ul class="ul">
    <li><a href="/">Home</a></li>
    <li><a href="/about">About</a></li>

    <div class="btn-group">
    <li>
      <a href="/destination">
        Destination
      </a>
      <a href="/destination" class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"  id="defaultDropdown" data-bs-auto-close="true" aria-expanded="false">
      </a>
      <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="defaultDropdown">

        @foreach ($destcategory as $categoryItem)
        <li><a class="dropdown-item" value="{{ $categoryItem->slug}}" href="/destination/destcategories/{{$categoryItem->slug}}">{{ $categoryItem->category_name}}</a></li>
        @endforeach


      </ul>
    </li>
  </div>
    <li><a href="/blog">Blog</a></li>
    <li><a href="/contact">Contact</a></li>
  </ul>

  <div>
  <a href="/login" class="login">Login</a>
  <a href="/register" class="signup">Register</a>
  </div>

  <div class="menu-toggle">
    <input type="checkbox"/>
    <span></span>
    <span></span>
    <span></span>
  </div>
  </div>
  </nav>
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">

</header>
