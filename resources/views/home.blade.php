    @extends('layouts.landing2')

    @section('content')
    {{-- <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>ad</strong>
    </div> --}}
    <section id="hero">
        {{-- <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>ad</strong>
        </div> --}}
        <div class="hero container">
            <div>
                <h1>Welcome <span></span></h1>
                <h1>to <span></span></h1>
                <h1>Data Center Department <span></span></h1>
                <a href="#ReadMore" type="button" class="cta">Read More</a>
            </div>
        </div>
    </section>

    <section id="VisitDC">
        <div class="VisitDC container">
            <div class="VisitDC-top">
                <h1 class="section-title">Visit Data Center</h1>
                <p>Welcome to Data Center Department, do you need help ? choose what you need and let us help you</p>
            </div>

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="VisitDC-bottom">
                <div class="VisitDC-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
                    <h2>Survey Data Center</h2>
                    <a href="survey" type="button" ><p>AR</p></a>

                </div>
                <div class="VisitDC-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
                    <h2>Maintenance</h2>
                    <a href="maintenance" type="button" ><p>AR/CR/ACL</p></a>

                </div>
                <div class="VisitDC-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
                    <h2>Troubleshoot</h2>
                    <a href="troubleshoot" type="button" ><p>AR/CR/ACL</p></a>

                </div>
                <div class="VisitDC-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
                    <h2>Mounting/Un-Mounting</h2>
                    <a href="mounting" type="button" ><p>AR/CR/ACL</p></a>

                </div>
            </div>
        </div>
    </section>

    <section id="ReadMore">
        <div class="ReadMore container">
            <div class="ReadMore-header">
                <h1 class="section-title">More About Us</span>
                </h1>
            </div>
            <div class="all-ReadMore">
                <div class="ReadMore-item">
                    <div class="ReadMore-info">
                        <h1>ISO</h1>
                        <h2>abut ISO bla bla bla</h2>
                        <p>Story</p>
                    </div>
                    <div class="project-img">
                        <img src="/gambar/img-1.png" alt="img">
                    </div>
                </div>
                <div class="ReadMore-item">
                    <div class="ReadMore-info">
                        <h1>Rated 3</h1>
                        <h2>Rated ? do you know that ?</h2>
                        <p>Rated is bla bla bla for bla bla bla</p>
                    </div>
                    <div class="project-img">
                        <img src="gambar/img-3.jpg" alt="img">
                    </div>
                </div>
                <div class="project-item">
                    <div class="project-info">
                        <h1>Facility</h1>
                        <h2>What we have ?</h2>
                        <p>we have bla bla bla and bla bla bla</p>
                    </div>
                    <div class="project-img">
                        <img src="/gambar/img-4.jpg" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <section id="footer">
        <div class="footer container">
            <div class="brand">
                <h1>Thank You</h1>
            </div>
            <h2>For Visiting Data Center Department</h2>
        </div>
    </section>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    @endsection
