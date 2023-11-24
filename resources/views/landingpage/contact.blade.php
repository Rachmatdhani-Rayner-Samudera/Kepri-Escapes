<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Contact - Kepri Escapes</title>

    <!-- Link to CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css')}}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-lMFmDOdNhz7Y5jpCr0DeHzcJS9JQx8m66o1PIaIQWxGc8qPi2sjhP5NH27cikFVz" crossorigin="anonymous">

    <!-- Box Icons -->
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

        .icon-container {
            display: inline-block;
            background-color: #4582e8;
            padding: 15px;
            border-radius: 15%;
            margin-right: 10px; /* Add margin-right for spacing between icons */
        }

        .icon-container i {
            color: #fff;
            font-size: 24px;
        }

        .contact-info {
            margin-top: 10px;
        }

        @media only screen and (max-width: 768px) {
            .subisubi {
                font-size: 1.1rem;
            }
        }
    </style>
</head>

<body>

    <!-- Header -->
    @include('includes.header')

    <!-- Home -->
    <section class="home" id="home">
        <div class="home-text container">
            <h2 class="home-title animated animatedFadeInUp fadeInUp">Contact</h2>
            <span class="home-subtitle animated animatedFadeInUp fadeInUp">Discover the way to keep in touch with Kepri Escapes</span>
        </div>
    </section>

    <!-- Content -->
    <section class="about" id="about">
        <div class="row">
            <div class="col">
                <div class="cuko animated animatedFadeInLeft fadeInLeft">
                    <div class="line mt-2"></div>
                    <p class="gettouch">Get In Touch</p>
                </div>
                <h2 class="subsub">Contact Us To Get More Info</h2>
                <p>Curiosity is the key to growth, and we're here to provide you with the insights you crave. Whether you're seeking information, have questions, or want to explore potential collaborations, reaching out to us is the first step in turning possibilities into reality.</p>
                <div class="image">
                    <img src="{{asset('assets/img/contact.jpg')}}" alt="" class="img-shadow-left animated animatedFadeInLeft fadeInLeft">
                </div>
            </div>
            <div class="col">
                <div class="bawah content animated animatedFadeInRight fadeInRight">
                    <h4 class="subsub">Need help? Feel free to contact us!</h4>
                    <div class="line"></div>
                    <p>Welcome to Kepri Escapes, your gateway to unforgettable adventures in the Riau Islands! We are not just a tour package provider; we are architects of beautiful memories that will linger in your mind for a lifetime. Kepri Escapes envisions bringing the beauty of the Riau Islands to you through travel packages that not only captivate but also fulfill your every adventure-seeking desire.</p>
                    <div class="contact-info">
                        <div>
                            <span class="icon-container">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            Kepulauan Riau, Tanjungpinang, SMKN 4 Tanjungpinang
                        </div>
                        <div>
                            <span class="icon-container">
                                <i class="fas fa-envelope"></i>
                            </span>
                            KepriEscapes@gmail.com
                        </div>
                        <div>
                            <span class="icon-container">
                                <i class="fab fa-whatsapp"></i>
                            </span>
                            08994879433
                        </div>
                    </div>
                    <div class="contact-info">
                        <div>
                            <h4>Follow us on social media..</h4>
                            <a href="https://www.instagram.com/kepri_escapes/?igshid=OGQ5ZDc2ODk2ZA%3D%3D" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-instagram icon-container" style="background-color: transparent;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    <img src="{{asset('assets/img/about3.jpg')}}" alt="" class="img-shadow-right animated animatedFadeInRight fadeInRight">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('includes.footer')

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- Link to JS -->
    <script src="{{asset('assets/js/blog.js')}}"></script>

</body>

</html>
