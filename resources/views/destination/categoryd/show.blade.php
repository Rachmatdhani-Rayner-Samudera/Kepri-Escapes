<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Destination Category - {{ $category_name }} </title>

  {{-- Link to CSS --}}
  <link rel="stylesheet" href="{{ asset('assets/css/blog.css')}}">
  {{-- bootsrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
  {{-- Box Icons --}}
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
  <style>
    .home{
      background:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/assets/img/destination.jpg');
      background-position: center
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
    <link rel="stylesheet" href="{{asset('assets/img/blog.jpg')}}">
    <div class="home-text container">
  
      <h2 class="home-title animated animatedFadeInUp fadeInUp">{{ $category_name }}</h2>
      <span class="home-subtitle animated animatedFadeInUp fadeInUp">See the details about package in {{ $category_name }}</span>
    </div>
  </section>
  {{-- Posts --}}
  
      <section class="post container animated animatedFadeInUp fadeInUp">
        
        @foreach ($destination as $packageItem)
      @php
      $picture = str_replace('public', 'storage', $packageItem->package_picture);
      $review = random_int(100, 2000);
      @endphp
        <div class="post-box">
          @if (!empty($packageItem->package_picture))
            <img src="{{ asset($picture) }}" alt="" class="post-img" style="display: block">
          @endif
          <div class="selain">
            <div class="profile">
              <img src="{{ asset('assets/img/location.png') }}" alt="" class="icon-img">
              <h2 class="category"><a href="/destination/destcategories/{{$packageItem->Categoryd->slug}}" class="text-decoration-none"> {{$packageItem->Categoryd->category_name }}</a></h2>
            </div>
            <div class="row">
              <div class="col-7">
                <a href="/destination/{{ $packageItem->slug }}" class="post-title">
                  {{ $packageItem->package_name }}
                </a>
                
                <div class="profile mt-3">
                  <img src="{{ asset('assets/img/clock.png') }}" alt="" class="icon-img">
                  <span class="profile-name">{{ $packageItem->time }}</span>
                </div>
              </div>

              <div class="col pricefull">
                <span class="from-title ">
                From
                </span>
                <span class="price-title ">
                  IDR {{ $packageItem->package_price }}K <span class="pax"> /pax</span>
                </span>
              </div>
            </div>
            <div class="row">
              <div class="col-9 rating mt-4">
                <img src="{{ asset('assets/img/star.png') }}" alt="" class="star">
                <img src="{{ asset('assets/img/star.png') }}" alt="" class="star">
                <img src="{{ asset('assets/img/star.png') }}" alt="" class="star">
                <img src="{{ asset('assets/img/star.png') }}" alt="" class="star">
                <img src="{{ asset('assets/img/star.png') }}" alt="" class="star">
                <span class="review">({{$review}} Review)</span>
              </div>

              <div class="col mt-4">
              <a href="/destination/{{ $packageItem->slug }}" class="view-more">
                View More >
              </a>
              </div>
            </div>
          
          </div>
        </div>
        </div>
        
      @endforeach
      </section>


  {{-- Footer --}}
  @include('includes.footer')
    











  {{-- JQuery --}}
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  {{-- link to JS --}}
  <script src="{{asset('assets/js/blog.js')}}"></script>
</body>
</html>