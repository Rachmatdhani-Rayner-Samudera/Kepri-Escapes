
<header>
  {{-- nav container --}}
  <nav>
  <div class="nav container">
  <a href="#" class="logo">Kepri<span>Escapes</span></a>

  <ul class="ul">
    <li><a href="/home">Home</a></li>
    <li><a href="/about">About</a></li>
    <li>
      <a href="/destination" class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"  id="defaultDropdown" data-bs-auto-close="true" aria-expanded="false">
        Destination
      </a>

      <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="defaultDropdown">

        <li><a class="dropdown-item" href="#">Kontol</a></li>

      </ul>
    </li>
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
  {{-- <div class="nav container">
  {{-- logo
  <a href="#" class="logo">Kepri<span>Escapes</span></a>
  <a href="#" class="login">Login</a>
  {{-- login btn --
  <a href="#" class="login">Login</a>
  </div>--}}
</header>
<script>
  // Mendapatkan elemen dropdown
  var destinationDropdown = document.getElementById("destination");

  // Model CategoryD (contoh nilai)
  var categoryD = ["Category1", "Category2", "Category3"];

  // Mengisi dropdown dengan nilai dari model CategoryD
  for (var i = 0; i < categoryD.length; i++) {
    var option = document.createElement("option");
    option.value = categoryD[i];
    option.text = categoryD[i];
    destinationDropdown.add(option);
  }
</script>
