<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('themes/frontend/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/frontend/node_modules/fontawesome-4.7/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/frontend/css/site.css') }}" />

    <title>TMI Warranty | @yield('title')</title>
</head>

<body>
    <section class="main container-fluid">
        <div class="row">
            <div class="col-md-6">
                <header>
                    <a href="index.html">
                        <img src="{{ asset('themes/frontend/assets/images/logo.PNG') }}" />
                    </a>
                </header>
                <div class="device-serial-form main-content main-padding">
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{session()->get('error')}}</div>
                    @endif
                    <h3 class="bold">
                        How to find device or software serial number?
                    </h3>
                    <br />
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="bold">
                                Medical devices
                            </h4>
                            <p class="grey">
                                Your serial number can be found printed on your device starts with "TMI".
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="bold">
                                Software
                            </h4>
                            <p class="grey">
                                Your software serial number can be found in about tab on your web or mobile application.
                            </p>
                        </div>
                        <div class="col-md-12">
                            <br />
                            <br />
                            <form action="{{route('device-details')}}">
                                <h3 class="bold">
                                    Device or software serial number
                                </h3>
                                <input name="serial" placeholder="e.g. TMI 1234567898765" />
                                <br />
                                <br />
                                <input class="btn" type="submit" value="Check serial" />
                            </form>
                        </div>
                    </div>
                </div>
                <footer>
                    <small class="bold center">
                        This system is a part of Telemed International, for additional information please visit <a
                            href="www.telemedint.net">www.telemedint.net</a> or call us <a
                            href="tel:+2 0100 000 0000">+2 0100
                            000 0000</a>
                    </small>
                </footer>
            </div>
            <div class="col-md-6 fill-home home-side white">
                <h2 class="bold">
                    Welcome to
                </h2>
                <h1 class="bold">
                    Telemed Warranaty and Maintenance
                </h1>
                <br />
                <br />
                <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it look like
                    readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                    default model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                    infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                    (injected humour and the like).
                </p>
                <br />
                <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it look like
                    readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                    default model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                    infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                    (injected humour and the like).
                </p>
            </div>
        </div>
    </section>
    <script src="{{ asset('themes/frontend/js/site.js') }}"></script>
</body>

</html>