<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Contact - Kepri Escapes</title>
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/blog.css">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <style>
        .home {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/assets/img/about.jpg');
            background-position: center;
        }

        .gettouch {
            margin-top: 17px;
            font-weight: 500;
            color: #4582E8;
        }

        .subsub {
            font-size: 2.5rem;
            color: black;
            font-weight: 600;
            padding-bottom: 20px;
        }

        .cuko {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .bawah {
            margin-top: 127px;
        }

        .subisubi {
            font-weight: 500;
            font-size: 1.3rem;
        }

        .icon-background,
        .bi-envelope-at-fill {
            padding: 5px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px; /* Tambahkan margin-right agar ikon terpisah */
        }

        .icon-color {
            color: #4582e8;
            font-size: 1.5em;
        }

        .location-box {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .location-content {
            flex: 1;
        }
    </style>
</head>

<body>
    @auth
    @include('includes.loginheader')
        @else
        @include('includes.header')
    @endauth

    <section class="home" id="home">
        <link rel="stylesheet" href="http://127.0.0.1:8000/assets/img/blog.jpg">
        <div class="home-text container">
            <h2 class="home-title animated animatedFadeInUp fadeInUp">Contact</h2>
            <span class="home-subtitle animated animatedFadeInUp fadeInUp">Discover the way to keep in touch with
                Kepri Escapes</span>
        </div>
    </section>

    <section class="about" id="about">
        <div class="row">
            <div class="col">
                <div class="cuko">
                    <div class="line mt-2"></div>
                    <p class="gettouch">Get In Touch</p>
                </div>
                <h3 class="subsub"> Contact Us To Get <br>More Info</h3>
                <div class="image">
                    <img src="http://127.0.0.1:8000/assets/img/about2.jpg" alt=""
                        class="img-shadow-left animated animatedFadeInLeft fadeInLeft">
                </div>
            </div>
            <div class="col">
                <div class="content animated animatedFadeInRight fadeInRight">
                    <h3> Kepri Escapes, Your Favorite Tour Provider</h3>
                    <p>Embark on your dream getaway with Kepri Escapes – your gateway to unparalleled travel experiences in the enchanting Kepulauan Riau region. Whether you have questions about our captivating tour packages, need assistance in planning your itinerary, or simply want to share your excitement, our team is here for you.</p>
                    <div class="line"></div>
                    <span class="icon-background">
                        <i class="bi bi-geo-alt-fill icon-color"></i>
                    </span>
                    Jl. Nusantara No.KM.14

                        <i class="bi bi-envelope-at-fill icon-color"></i>

                    kepriescapes@gmail.com
                    <i class="bi bi-whatsapp icon-color"></i> +628994879433
                </div>
            </div>
        </div>
    </section>

    <div class="footer">
        <p>&#169; Kepri Escapes All Right Reserved</p>
        <div class="social">
            <a href="https://www.instagram.com/kepri_escapes/"><i class="bx bxl-instagram"></i></a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="http://127.0.0.1:8000/assets/js/blog.js"></script>
</body>

</html>
