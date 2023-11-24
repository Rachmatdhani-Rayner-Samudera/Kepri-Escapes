<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home - Kepri Escapes</title>

  {{-- Link to CSS --}}
  <link rel="stylesheet" href="{{ asset('assets/css/blog.css')}}">
  {{-- Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  {{-- Box Icons --}}
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <style>
    .home {
      position: relative;
      height: 100vh;
      margin-top: -70px; /* Adjust as needed */
    }

    #background-video {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
    }

    .home-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: #fff; /* Adjust text color */
    }

    .home-subtitle {
      font-size: 1.5rem; /* Adjust as needed */
      display: block;
    }

    .home-title {
      font-size: 3rem; /* Adjust as needed */
      margin-top: 10px;
      display: block;
    }

    .post {
      padding: 50px 0; /* Adjust padding as needed */
    }

    .content {
      text-align: center;
    }

    .line {
      width: 50px; /* Adjust line width */
      height: 2px;
      background-color: #000; /* Adjust line color */
      margin: 15px auto; /* Adjust margin as needed */
    }

    .image img {
      max-width: 100%;
      height: auto;
    }
  </style>

</head>
<body>

  {{-- header --}}
  @auth
    @include('includes.loginheader')
  @else
    @include('includes.header')
  @endauth

  {{-- home --}}
  <section class="home" id="home">
    <video id="background-video" autoplay loop muted playsinline>
      <source src="/assets/vid/video_kepri.mp4" type="video/mp4">
    </video>
    <div class="overlay"></div>
    <div class="home-text container">
      <span class="home-subtitle animated animatedFadeInUp fadeInUp">Discover the paradise of</span>
      <h2 class="home-title animated animatedFadeInUp fadeInUp">Kepulauan Riau</h2>
    </div>
  </section>

  <section class="post container animated animatedFadeInUp fadeInUp">
    <div class="row">
      <div class="col">
        <div class="content animated animatedFadeInLeft fadeInLeft">
          <h3>Enjoy Your Holiday With Us</h3>
          <div class="line"></div>
          <p>We are not just a tour package provider; we are the architects of beautiful memories that will remain in your memory for the rest of your life. Kepri Escapes is here with a vision to present the natural beauty of the Riau Islands in a travel package that is not only stunning but also fulfills your every adventure wish.</p>
        </div>
      </div>
      <div class="col">
        <div class="image">
          <img src="http://127.0.0.1:8000/assets/img/about3.jpg" alt="" class="img-shadow-right animated animatedFadeInRight fadeInRight">
        </div>
      </div>
    </div>
  </section>

  {{-- Footer --}}
  @include('includes.footer')

  {{-- JQuery --}}
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  {{-- link to JS --}}
  <script src="{{asset('assets/js/blog.js')}}"></script>
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
      var video = document.getElementById('background-video');
      video.play();
    });
  </script>
</body>
</html>
