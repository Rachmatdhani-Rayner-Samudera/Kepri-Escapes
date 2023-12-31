<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

  <title>Detail Package Page</title>


   {{-- Link to CSS --}}
   <link rel="stylesheet" href="{{ asset('assets/css/blog.css')}}">
   {{-- bootsrap --}}
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
     
   {{-- Box Icons --}}
   <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">

</head>
<body>
  {{-- header --}}
  @include('includes.header')

  {{-- @php
  $picture = str_replace('public', 'storage', $detail->package_picture);
  @endphp --}}
  {{-- Posts Content --}}
  <section class="post-header">
    <div class="header-content post-container">
    
      <a href="/destination" class="back-home">Back to Destination</a>
      <a href="/" class="logo"><span>category</span></a>
      
      <h1 class="header-title">package name</h1>
    
      <img src="{{ asset('assets/img/about.jpg') }}" alt="" class="header-img">
    </div>
    
  </section>
  <section class="post-content post-container">
    {{-- <p class="post-text"> {!! $detail->package_content !!}</p> --}}

    <h4 class="sub-title">Order Now!</h4>
    
      <form action="/checkout" method="post">
        @csrf
        <div class="mb-6">
          <label for="qty" class="form-label">How many tickets do you want to order?</label>
          <input name="qty" type="number" class="form-control" id="qty" required>
        </div>
        <div class="mb-6">
          <label for="name" class="form-label">Your name</label>
          <input name="name" type="text" class="form-control" id="text" required>
        </div>
        <div class="mb-6">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" id="email" value="" required>
        </div>
        <div class="mb-6">
          <label for="phone" class="form-label">Phone Number</label>
          <input name="phone" type="text" class="form-control" id="phone" required>
        </div>
        <div class="mb-6">
        <button type="submit" class="btn btn-primary">Checkout</button>
        </div>
      </form>

  </section>

  {{-- Footer --}}
  @include('includes.footer')
  </div>
    











  {{-- JQuery --}}
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  {{-- link to JS --}}
  <script src="{{asset('assets/js/blog.js')}}"></script>
</body>
</html>
