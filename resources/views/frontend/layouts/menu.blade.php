 <!-- Navbar Start -->
 <div class="container-fluid sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark p-0">
            <a href="index " class="navbar-brand">
                <h1 class="text-white">AI<span class="text-dark">.</span>Tech</h1>
            </a>
            <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                    <a href="{{ route('services') }} " class="nav-item nav-link">Services</a>
                    <a href="{{ route('projects') }} " class="nav-item nav-link">Projects</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Others</a>
                        <div class="dropdown-menu bg-light mt-2">
                            <a href="{{ route('features') }} " class="dropdown-item">Features</a>
                            <a href="{{ route('team') }} " class="dropdown-item">Our Team</a>
                            <a href="{{ route('faq') }} " class="dropdown-item">FAQs</a>
                            <a href="{{ route('testimonial') }} " class="dropdown-item">Testimonial</a>
                           
                        </div>
                    </div>
                    <a href="{{ route('contact') }} " class="nav-item nav-link">Contact</a>
                </div>
                <butaton type="button" class="btn text-white p-0 d-none d-lg-block" data-bs-toggle="modal"
                    data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->