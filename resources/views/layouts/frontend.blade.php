<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FindJob - @yield('title') </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('public/frontend/images/logo.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="{{ asset('public/frontend/fontawesome/css/all.min.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('/') }}public/frontend/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}public/frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/') }}public/frontend/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('/') }}public/frontend/css/style.css" rel="stylesheet">
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">
</head>

<body>
    <div class="container-fluid bg-white p-0">
        <!-- Spinner Start -->
        {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary"><img src="{{ asset('public/frontend/images/logo.png') }}" width="100"></h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home*') ? 'active' : '' }}"><i class="fa fa-home me-1" aria-hidden="true"></i> Home</a>
                    <a href="about.html" class="nav-item nav-link"><i class="fa fa-brush me-1" aria-hidden="true"></i> About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-briefcase me-1"></i> Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.html" class="dropdown-item">Job List</a>
                            <a href="job-detail.html" class="dropdown-item">Job Detail</a>
                        </div>
                    </div>
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="category.html" class="dropdown-item">Job Category</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404</a>
                        </div>
                    </div> --}}
                    <a href="contact.html" class="nav-item nav-link me-5"><i class="fas fa-map-marker-alt me-1"></i> Contact</a>
                </div>
                @if (Auth::check())
                    <a class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('public/frontend/images/user_simple.png') }}" class="me-2" width="30" style="border-radius: 50%;"> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fa fa-address-card me-1" aria-hidden="true"></i> Profile</a></li>
                        @if (Auth::user()->role != 'Customer')
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}" target="_blank"><i class="fas fa-tachometer-alt me-1" aria-hidden="true"></i> Dashboard</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="{{ route('logout') }}" class="dropdown-item" onclick="confirmation_logout(event)"><i class="fa fa-power-off me-1" aria-hidden="true"></i> Logout</a></li>
                        </ul>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block {{ request()->routeIs('login*') ? 'active' : '' }} {{ request()->routeIs('register*') ? 'active' : '' }}">
                        <i class="fas fa-sign-in-alt me-1" aria-hidden="true"></i> Login <span class="text-info fw-bold me-1">/</span>
                        <i class="fa fa-user-plus me-1" aria-hidden="true"></i> Register
                    </a>
                @endif

            </div>
        </nav>
        <!-- Navbar End -->


        @yield('content')


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Company</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                            </br>Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}public/frontend/lib/wow/wow.min.js"></script>
    <script src="{{ asset('/') }}public/frontend/lib/easing/easing.min.js"></script>
    <script src="{{ asset('/') }}public/frontend/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('/') }}public/frontend/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('/') }}public/frontend/js/main.js"></script>

    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
    <script>
        // Swal.fire({
        //     toast: true,
        //     position: 'top-end',
        //     showConfirmButton: false,
        //     timer: 3000,
        //     timerProgressBar: true,
        //     icon: "error",
        //     text: '{{ Session::get('success') }}',
        // });
        $("document").ready(function() {
            setTimeout(function() {
                $("div.alert-danger").remove();
            }, 3000); // 5 secs

        });
    </script>

    @if (Session::has('fail'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "error",
                text: '{{ Session::get('fail') }}',
            });
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "success",
                text: '{{ Session::get('success') }}',
            });
        </script>
    @endif

        <script>
            function confirmation_logout(e)
            {
                e.preventDefault();
                var urlToRedirect = e.currentTarget.getAttribute('href');
                console.log(urlToRedirect);

                Swal.fire({
                    title: "Are you sure to Logout?",
                    // text: "this is logout!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#04dc3c",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "<i class='far fa-hand-point-right'></i> Yes, I do!"
                    }).then((result) => {
                    if (result.isConfirmed) {

                        window.location.href=urlToRedirect;

                    }
                });
            }


            function confirmation(e)
            {
                e.preventDefault();
                var urlToRedirect = e.currentTarget.getAttribute('href');
                console.log(urlToRedirect);

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                    if (result.isConfirmed) {

                        window.location.href=urlToRedirect;

                    }
                });
            }

            function preview(event)
            {
                const input = event.target.files[0];
                const reader = new FileReader();

                reader.onload = function(){
                    const result = reader.result;
                    const img = document.getElementById('img');
                    img.src = result;
                }

                reader.readAsDataURL(input);
            }
        </script>

        @yield('script')
</body>

</html>
