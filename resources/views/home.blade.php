@extends('layouts.landing2')

    @section('content')

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
    @endsection

    <section id="hero">
        <div class="hero container">
            <div>
                <h1>Welcome <span></span></h1>
                <h1>to <span></span></h1>
                <h1>Data Center Department <span></span></h1>
                <a href="#ReadMore" type="button" class="cta">Read More</a>
            </div>
        </div>
    </section>

    @if(Auth::user()->role == 'visitor')
    <section id="VisitDC">
        <div class="VisitDC container">
            <div class="VisitDC-top">
                <h1 class="section-title">Visit Data Center</h1>
                <p>Welcome to Data Center Department, do you need help ? choose what you need and let us help you</p>
            </div>
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
                    <a href="mount" type="button" ><p>AR/CR/ACL</p></a>
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

    @else
    <section id="Approval">
        <div class="Approval container" style="width: 500px">
            <div class="Approval-top">
                <h1 class="section-title">Approval</h1>
                <p>Silahkan Pilih Form yang Akan di Approval</p>
            </div>
            <div class="Approval-bottom">
                <div class="Approval-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
                    <a href="hasil_survey" type="button" ><h2>Survey</h2>
                </div>

                <div class="Approval-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
                    <a href="hasil_maintenance" type="button" ><h2>Maintenance</h2>
                </div>

                <div class="Approval-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
                    <a href="hasil_troubleshoot" type="button" ><h2>Troubleshoot</h2>
                </div>

                <div class="Approval-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
                    <a href="hasil_mounting" type="button" ><h2>Mounting</h2>
                </div>

                <div class="Approval-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
                    <a href="hasil_BM" type="button" ><h2>BM</h2>
                </div>
            </div>
        </div>
    </section>
    @endif
