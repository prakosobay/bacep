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
                    <a href="survey" type="button" ><h2>Survey</h2></a>
                </div>

                <div class="VisitDC-item">
                    <a href="maintenance" type="button" ><h2>Maintenance</h2></a>
                </div>

                <div class="VisitDC-item">
                    <a href="troubleshoot" type="button" ><h2>Troubleshoot</h2></a>
                </div>

                <div class="VisitDC-item">
                    <a href="mount" type="button" ><h2>Mounting/Un-Mounting</h2></a>
                </div>
            </div>
        </div>
    </section>

    @elseif(Auth::user()->role == 'requestor')
    <section id="VisitDC">
        <div class="VisitDC container">
            <div class="VisitDC-top">
                <h1 class="section-title">Visit Data Center</h1>
                <p>Welcome to Data Center Department, do you need help ? choose what you need and let us help you</p>
            </div>
            <div class="VisitDC-bottom">
                <div class="VisitDC-item">
                    <a href="survey" type="button" ><h2>Survey</h2></a>
                </div>

                <div class="VisitDC-item">
                    <a href="maintenance" type="button" ><h2>Maintenance</h2></a>
                </div>

                <div class="VisitDC-item">
                    <a href="troubleshoot" type="button" ><h2>Troubleshoot</h2></a>
                </div>

                <div class="VisitDC-item">
                    <a href="mount" type="button" ><h2>Mounting/Un-Mounting</h2></a>
                </div>
            </div>
        </div>
    </section>

    @elseif(Auth::user()->role == 'bm')
    <section id="BM">
        <div class="BM container">
            <div class="BM-top">
                <h1 class="section-title">Visit Data Center</h1>
                <p>Welcome to Data Center Department, do you need help ? choose what you need and let us help you</p>
            </div>

            <div class="BM-bottom">
                <div class="BM-item">
                    <a href="cleaning_bm" type="button" ><h2>Cleaning</h2></a>
                </div>

                <div class="BM-item">
                    <a href="other" type="button" ><h2>Other</h2></a>
            </div>
        </div>
    </section>
    @endif
