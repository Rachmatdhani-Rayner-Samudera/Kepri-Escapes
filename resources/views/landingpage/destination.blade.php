<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Destination - Kepri Escapes</title>

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
    .selain{
      padding: 10px 20px 30px 20px;
    }
    .post-img{
      border-radius: 1rem 1rem 0 0;
    }
  </style>

</head>
<body>
  {{-- header --}}
 @include('includes.header')

  {{-- home --}}
  <section class="home" id="home">
    <link rel="stylesheet" href="{{asset('assets/img/blog.jpg')}}">
    <div class="home-text container">
  
      <h2 class="home-title animated animatedFadeInUp fadeInUp">Destination</h2>
      <span class="home-subtitle animated animatedFadeInUp fadeInUp">Treat yourself with the paradise of the Kepulauan Riau</span>
    </div>
  </section>
    <section class="post container animated animatedFadeInUp fadeInUp">
      @foreach ($destination as $packageItem)
      @php
      $picture = str_replace('public', 'storage', $packageItem->package_picture);
      @endphp
        <div class="post-box">
          @if (!empty($packageItem->package_picture))
            <img src="{{ asset($picture) }}" alt="" class="post-img" style="display: block">
          @endif
          <div class="selain">
            <h2 class="category">{{ $packageItem->Categoryd->category_name }}</h2>

            <div class="row">
              <div class="col-7">
                <a href="/destination/{{ $packageItem->slug }}" class="post-title">
                  {{ $packageItem->package_name }}
                </a>
              </div>

              <div class="col mt-1">
                <span class="from-title ">
                From
                </a>
                </span>
                <span class="price-title ">
                  IDR {{ $packageItem->package_price }}K
                </span>
              </div>
            </div>


            <span class="post-date">{{ Carbon\Carbon::parse($packageItem->created_at)->isoFormat('D MMMM Y') }}</span>
            <p class="post-description">{!! \Illuminate\Support\Str::limit($packageItem->package_content, $limit = 50, $end = '...') !!}</p>
      
            <div class="profile">
              <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="" class="profile-img">
              <span class="profile-name">{{ $packageItem->package_price }}</span>
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