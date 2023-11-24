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

    .about .row .image img{
    border-radius: 20px;
    width: 100%;
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
      padding: 75px 0;

    }

    .content {
      text-align: center;
    }

    .about .row .content p{
  font-size: 1rem;
  color: #212529;
  padding: 1rem 0;
  line-height: 1.8;
  text-align: left;
}

.line{
  margin-top: 19px;
  margin-bottom: 5px;
  width: 100px;
  height: 3px;
  background: var(--second-color);
}

.about .row .content h3{
  font-size: 2rem;
  color: black;
  font-weight: 600;
  text-align: left;
}

    .image img {
      max-width: 100%;
      height: auto;
    }


    #view-more-btn {
      margin-top: 20px;

    }

    .from-title{
      text-decoration: none;
      font-size: 1rem;
      margin-top: 5px;
      color: #000000;
      display: block;
      overflow: hidden;
      font-weight: 500;
      text-align: end

    }
    .price-title{
      text-decoration: none;
      font-size: 1.3rem;
      font-weight: 600;
      display: block;
      color: #4582E8;
      text-align: end;
      overflow: hidden;
    }
    .post-box{
      padding: 0px;
    }
    .post-title{
      margin-top: -1px;
    }
    .category{
      font-size: 12px;
    }
    .profile-name{
      margin-top: 2px;
    }
    .selain{
      padding: 10px 20px 30px 20px;
    }
    .category{
      padding-bottom: 5px;
    }
    .post-img{
      border-radius: 1rem 1rem 0 0;
    }
    .icon-img{
      width: 20px;
      height: 20px;
      object-fit: cover;
      object-position: center;
    }
    .category{
     margin-top: 13px;
    }
    .pax{
      text-decoration: none;
      font-size: 0.8rem;
      font-weight: 500;
      display: block;
      color: #4582E8;
      text-align: end;
      overflow: hidden;
    }
    .pricefull{
      margin-top: -5px
    }
    .star{
      width: 15px;
      height: 15px;
      object-fit: cover;
      object-position: center;
    }
    .rating{
      display: flex;
      align-items: center;
      gap: 3px;
    }
    .review{
      font-size: 0.75rem;
      font-weight: 500;
      color:#a5a5a5;
      margin-top: 3px;
    }
    .view-more{
      text-decoration: none;
      font-size: 0.7rem;
      color: #000000;
      display: block;
      overflow: hidden;
      font-weight: 500;
      margin-left: -5px;
      text-align: end
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

  <section class="about" id="about">
    <div class="row">
      <div class="col">
        <div class="image">
          <img src="http://127.0.0.1:8000/assets/img/about2.jpg" alt="" class="img-shadow-left animated animatedFadeInLeft fadeInLeft">
        </div>
      </div>
      <div class="col">
        <div class="content animated animatedFadeInRight fadeInRight">
          <h3> Kepri Escapes, Your Favorite Tour Provider</h3>
          <div class="line"></div>
          <p>Welcome to Kepri Escapes, your gateway to unforgettable adventures in the Riau Islands! We are not just a tour package provider; we are architects of beautiful memories that will linger in your mind for a lifetime. Kepri Escapes envisions bringing the beauty of the Riau Islands to you through travel packages that not only captivate but also fulfill your every adventure-seeking desire.</p>

          <!-- View More Button -->
          <button id="view-more-btn" class="btn btn-primary" style="float: left; color: white;"><a href="/about" style="color: white;">View More</a></button>

        </div>
      </div>
    </div>
  </section>

  <h1 style="text-align: center">Populer Packages</h1>


  <section class="post container animated animatedFadeInUp fadeInUp">
    <div class="post-box">
      <img src="http://127.0.0.1:8000/assets/img/bintan-lagoi-bay.jpg" alt="" class="post-img" style="display: block">
    <div class="selain">
<div class="profile">
<img src="http://127.0.0.1:8000/assets/img/location.png" alt="" class="icon-img">
<h2 class="category"><a href="/destination/destcategories/bintan-island" class="text-decoration-none"> Bintan Island</a></h2>
</div>
<div class="row">
<div class="col-7">
<a href="/destination/one-day-tour-lagoi-bay" class="post-title">
  One Day Tour Lagoi Bay
</a>

<div class="profile mt-3">
  <img src="http://127.0.0.1:8000/assets/img/clock.png" alt="" class="icon-img">
  <span class="profile-name">1 Day 1 Night</span>
</div>
</div>

<div class="col pricefull">
<span class="from-title ">
From
</span>
<span class="price-title ">
  IDR 1000K <span class="pax"> /pax</span>
</span>
</div>
</div>
<div class="row">
<div class="col-8 rating mt-4">
<img src="http://127.0.0.1:8000/assets/img/star.png" alt="" class="star">
<img src="http://127.0.0.1:8000/assets/img/star.png" alt="" class="star">
<img src="http://127.0.0.1:8000/assets/img/star.png" alt="" class="star">
<img src="http://127.0.0.1:8000/assets/img/star.png" alt="" class="star">
<img src="http://127.0.0.1:8000/assets/img/star.png" alt="" class="star">
<span class="review">(1660 Review)</span>
</div>

<div class="col mt-4">
<a href="/destination/one-day-tour-lagoi-bay" class="view-more">
View More &gt;
</a>
</div>
</div>

</div>
</div>


    <div class="post-box">
      <img src="http://127.0.0.1:8000/assets/img/batam-city.jpg" alt="" class="post-img" style="display: block">
    <div class="selain">
<div class="profile">
<img src="http://127.0.0.1:8000/assets/img/location.png" alt="" class="icon-img">
<h2 class="category"><a href="/destination/destcategories/batam-city" class="text-decoration-none"> Batam City</a></h2>
</div>
<div class="row">
<div class="col-7">
<a href="/destination/one-day-tour-batam" class="post-title">
  One Day Tour Batam,
</a>

<div class="profile mt-3">
  <img src="http://127.0.0.1:8000/assets/img/clock.png" alt="" class="icon-img">
  <span class="profile-name">1 Day</span>
</div>
</div>

<div class="col pricefull">
<span class="from-title ">
From
</span>
<span class="price-title ">
  IDR 250K <span class="pax"> /pax</span>
</span>
</div>
</div>
<div class="row">
<div class="col-8 rating mt-4">
<img src="http://127.0.0.1:8000/assets/img/star.png" alt="" class="star">
<img src="http://127.0.0.1:8000/assets/img/star.png" alt="" class="star">
<img src="http://127.0.0.1:8000/assets/img/star.png" alt="" class="star">
<img src="http://127.0.0.1:8000/assets/img/star.png" alt="" class="star">
<img src="http://127.0.0.1:8000/assets/img/star.png" alt="" class="star">
<span class="review">(214 Review)</span>
</div>

<div class="col mt-4">
<a href="/destination/one-day-tour-batam" class="view-more">
View More &gt;
</a>
</div>
</div>

</div>
</div>


    <div class="post-box">
      <img src="http://127.0.0.1:8000/assets/img/penyengat.jpg" alt="" class="post-img" style="display: block">
    <div class="selain">
<div class="profile">
<img src="http://127.0.0.1:8000/assets/img/location.png" alt="" class="icon-img">
<h2 class="category"><a href="/destination/destcategories/tanjungpinang-city" class="text-decoration-none"> Tanjungpinang City</a></h2>
</div>
<div class="row">
<div class="col-7">
<a href="/destination/one-day-tour-lagoi-bay" class="post-title">
  One Day Tour Penyengat Island
</a>

<div class="profile mt-3">
  <img src="http://127.0.0.1:8000/assets/img/clock.png" alt="" class="icon-img">
  <span class="profile-name">1 Day</span>
</div>
</div>

<div class="col pricefull">
<span class="from-title ">
From
</span>
<span class="price-title ">
  IDR 250K <span class="pax"> /pax</span>
</span>
</div>
</div>
<div class="row">
<div class="col-8 rating mt-4">
<img src="http://127.0.0.1:8000/assets/img/star.png" alt="" class="star">
<img src="http://127.0.0.1:8000/assets/img/star.png" alt="" class="star">
<img src="http://127.0.0.1:8000/assets/img/star.png" alt="" class="star">
<img src="http://127.0.0.1:8000/assets/img/star.png" alt="" class="star">
<img src="http://127.0.0.1:8000/assets/img/star.png" alt="" class="star">
<span class="review">(705 Review)</span>
</div>

<div class="col mt-4">
<a href="/destination/one-day-tour-lagoi-bay" class="view-more">
View More &gt;
</a>
</div>
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
