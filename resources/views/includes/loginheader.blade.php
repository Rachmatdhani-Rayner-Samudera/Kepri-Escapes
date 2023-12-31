
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
      <ul class="navsi dropdown-menu dropdown-menu-dark" aria-labelledby="defaultDropdown">

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
    <li class="nav-item dropdown pe-3">
      <a class="nav-link nav-profile d-flex align-items-center pe-0" href=""
          data-bs-toggle="dropdown">
          <span class="account-title d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
      </a>
      <ul class="kunsi dropdown-menu dropdown-menu-dark dropdown-menu-end dropdown-menu-arrow profile">

            <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                    <i class="bi bi-box-arrow-right pe-2"></i>
                    <span>Sign Out</span>
                </a>
            </li>

          </li>
      </ul>
  </li>
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

