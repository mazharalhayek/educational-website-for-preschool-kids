<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta name="keywords" content="​Make kids happy">
        <meta name="description" content="">
        <title>ChildLearn</title>
        <link rel="stylesheet" href="{{ asset('css/nicepage.css') }}" media="screen">
        <link rel="stylesheet" href="{{ asset('css/Gallery-1.css') }}" media="screen">
        <script class="u-script" type="text/javascript" src="{{ asset('js/jquery-1.9.1.min.js') }}" defer=""></script>
        <script class="u-script" type="text/javascript" src="{{ asset('js/nicepage.js') }}" defer=""></script>
        <meta name="generator" content="Nicepage 6.0.13, nicepage.com">
        <meta name="referrer" content="origin">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link id="u-theme-google-font" rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Finger+Paint:400">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ asset('js/scriptes.js') }}"></script>
        <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"url": "/"
}</script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <meta name="theme-color" content="#478ac9">
        <meta property="og:title" content="Gallery 1">
        <meta property="og:type" content="website">
        <link rel="canonical" href="/">
        <meta data-intl-tel-input-cdn-path="intlTelInput/">
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $(".messages .alert").fadeOut("slow");
                }, 3000);
            });
        </script>
        <style>
            .messages {
                position: fixed;
                margin-top: 7px;
                width: max-content;
                z-index: 10000;
            }
            .errors {
                width:20rem;
                border: 1px;
                padding: 0%;
                background-color: #eb4040;
                color:black;
            }

            #success {
                width: max-content;
            }
        </style>
    </head>

    <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en">
        <section class="u-clearfix u-palette-4-base u-section-1" id="sec-02bb"
            style="background-image:url({{ asset('images/Untitled-8.jpg') }});background-size:cover;background-repeat:no-repeat">
            <header id="welcome_header">
                <h1 style="font-family: Finger Paint;font-size:50px">ChildLearn</h1>
                <div id="welcome_header_bu">
                    <a href="#"><button>Our tutors</button></a>
                    <a href="#"><button>Books</button></a>
                    <a href="#"><button>Games</button></a>
                    <a href="#"><button>Plans</button></a>
                    <a href="#"><button>Sheets</button></a>
                </div>
            </header>
            <div class="messages" align="left">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger errors alert-dismissible fade show" role="alert">
                            <ul>
                                <li><h8>Wrong password or username</h8></li>
                            </ul>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="u-clearfix u-sheet u-sheet-1">
                <h2 class="u-align-center u-custom-font u-text u-text-default u-text-1" style="margin-top:-0px"></h2>
                </p>
                <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                    <div class="u-layout">
                        <div class="u-layout-row">
                            <div
                                class="u-container-align-center-sm u-container-align-center-xs u-container-align-left-lg u-container-align-left-md u-container-align-left-xl u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                                <div class="u-container-layout u-valign-middle u-container-layout-2"><b>
                                        <div class="registration">
                                            <h2 align="center">Login</h2>
                                            <h8>Enter your email & password here</h8>
                                            <form method="POST" action="{{ route('login') }}" align="center">
                                                @csrf
                                                <label for="email">Email:</label><br>
                                                <input type="email" name="email" required>

                                                <label for="password">Password:</label><br>
                                                <input type="password" name="password" required autofocus>

                                                <input type="submit" value="Login">
                                            </form>
                                            <h8>Don't have an account? <a href="{{ route('register') }}"> SignUp</a>
                                            </h8>
                                            <br>
                                            @if (Route::has('password.request'))
                                                <h8>Forgot your password? <a href="{{ route('password.request') }}">
                                                        Reset</a></h8>
                                            @endif

                                        </div>
                                        <div class="welome_intro">
                                            <p
                                                class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-3">
                                                Welcome to ChildLearn where your kids can learn and have fun at the same
                                                time!!
                                            </p>
                                            <img src="{{ asset('images/logo5.png') }}" alt="">
                                            <h5
                                                class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-4">
                                                JOIN US!!</h5>
                                            <p
                                                class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-5">
                                                Join our community , whether you are a tutor who wants to be in our
                                                tutors
                                                team
                                                & teach the new generation or a parent who wants to put their children
                                                on
                                                the
                                                right path to be successful</p>
                                        </div><br><br>
                                        <div class="carousel">
                                            <div class="carousel-slide">
                                                <img src="{{ asset('images/Alphabet.png') }}" alt="Image 1">
                                            </div>
                                            <div class="carousel-slide">
                                                <img src="{{ asset('images/Numbers.jpg') }}" alt="Image 2">
                                            </div>
                                        </div>
                                    </b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="u-clearfix u-container-align-center u-palette-4-dark-3 u-section-3" id="sec-9cbe">
            <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
                <p class="u-align-center u-text u-text-1">In case you want to be uptodate , follow us on social media
                    platforms like FaceBook , Twitter & Instagram</p>
                <div class="u-social-icons u-spacing-10 u-social-icons-1">
                    <a class="u-social-url" title="facebook" target="_blank" href="https://facebook.com/name"><span
                            class="u-icon u-social-facebook u-social-icon u-text-palette-3-base u-icon-1"><svg
                                class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112"
                                style="">
                                <use xlink:href="#svg-0805"></use>
                            </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-0805">
                                <path fill="currentColor" d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2
c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path>
                            </svg></span>
                    </a>
                    <a class="u-social-url" title="twitter" target="_blank" href="https://twitter.com/name"><span
                            class="u-icon u-social-icon u-social-twitter u-text-palette-3-base u-icon-2"><svg
                                class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112"
                                style="">
                                <use xlink:href="#svg-6de7"></use>
                            </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-6de7">
                                <path fill="currentColor" d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2
 c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7
 c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2
 c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5
 c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path>
                            </svg></span>
                    </a>
                    <a class="u-social-url" title="instagram" target="_blank"
                        href="https://instagram.com/name"><span
                            class="u-icon u-social-icon u-social-instagram u-text-palette-3-base u-icon-3"><svg
                                class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112"
                                style="">
                                <use xlink:href="#svg-3344"></use>
                            </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-3344">
                                <path fill="currentColor" d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z
 M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path>
                                <path fill="#FFFFFF"
                                    d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z">
                                </path>
                                <path fill="currentColor" d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7
 V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7
 c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path>
                            </svg></span>
                    </a>
                </div>
            </div>
        </section>
        <section class="u-clearfix u-container-align-center u-palette-2-base u-section-5" id="sec-5e66">
            <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
                <h2 class="u-align-center u-text u-text-default u-text-1">Book a free consualtion</h2>
                <p class="u-align-center u-text u-text-default u-text-2">Chat with our tutors team to get to know them
                </p>
                <table id="teachers">
                    <tr>
                        <th><img src="{{ asset('images/teacher1.png') }}" alt="" class="teachers_pics"></th>
                        <th><img src="{{ asset('images/teacher2.png') }}" alt="" class="teachers_pics"></th>
                        <th><img src="{{ asset('images/teacher3.png') }}" alt="" class="teachers_pics"></th>
                    </tr>
                    <tr>
                        <td><b>Sarah John</b></td>
                        <td><b>Sabrina Smith</b></td>
                        <td><b>Gearge Floyd</b></td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Science Teacher</h4>
                        </td>
                        <td>
                            <h4>Math Teacher</h4>
                        </td>
                        <td>
                            <h4>Art Teacher</h4>
                        </td>
                    </tr>
                </table>

            </div>
        </section>
        <section class="u-align-center u-clearfix u-image u-section-6" id="sec-805d"
            style="background-image:url('images/clouds-bg.png');background-size:cover;background-repeat:no-repeat;">
            <div class="u-clearfix u-sheet u-valign-middle-xs u-sheet-1">
                <h4 class="u-align-center u-custom-font u-text u-text-default u-text-1"> Sign up for the newsletter
                </h4>
                <p class="u-align-center u-text u-text-2"> Want to be the first to read our news? Subscribe to the
                    newsletter to keep abreast of all events. </p>
                <div class="u-form u-form-1">
                    <form action="https://forms.nicepagesrv.com/v2/form/process"
                        class="u-clearfix u-form-horizontal u-form-spacing-26 u-inner-form" source="email"
                        name="form" style="padding: 0px;">
                        <div class="u-form-email u-form-group u-label-none">
                            <label for="email-6564" class="u-label">Email</label>
                            <input type="email" placeholder="Enter a valid email address" id="email-6564"
                                name="email" class="u-input u-input-rectangle u-radius-50" required="">
                        </div>
                        <div class="u-align-left u-form-group u-form-submit u-label-none">
                            <a href="#"
                                class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-3-base u-radius-50 u-btn-2">Submit</a>
                            <input type="submit" value="submit" class="u-form-control-hidden">
                        </div>
                        <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent.
                        </div>
                        <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix
                            errors
                            then try again. </div>
                        <input type="hidden" value="" name="recaptchaResponse">
                        <input type="hidden" name="formServices" value="95bccd32-8f0a-74c9-0a77-4981b3f6610f">
                    </form>
                </div>
            </div>
        </section>



        <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-176d" style="height:1cm">
            <div class="u-clearfix u-sheet u-sheet-1">
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                    <table>
                        <th>
                        <td style="padding:10px">
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="#">Home</a></li>
                        </td>
                        <td style="padding:10px">
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="#">Landing</a>
                            </li>
                        </td>
                        <td style="padding:10px">
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="#">About</a></li>
                        </td>
                        <td style="padding:10px">
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="#">Gallery</a>
                            </li>
                        </td>
                        <td style="padding:10px">
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="#">Contact</a>
                            </li>
                        </td>
                        </th>
                    </table>
                </ul>
            </div>
        </footer>
        <section class="u-backlink u-clearfix u-grey-80">
            <a class="u-link" href="#" target="_blank">
                <span>Web Design</span>
            </a>
            <p class="u-text">
                <span>created with</span>
            </p>
            <a class="u-link" href="#" target="_blank">
                <span>Best HTML editor</span>
            </a>.
        </section>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var carousel = document.querySelector('.carousel');
                var slides = Array.from(carousel.querySelectorAll('.carousel-slide'));
                var currentSlide = 0;
                var slideInterval = setInterval(nextSlide, 3000);

                function nextSlide() {
                    slides[currentSlide].style.opacity = 0;
                    currentSlide = (currentSlide + 1) % slides.length;
                    slides[currentSlide].style.opacity = 1;
                }
            });
        </script>
    </body>

</html>
