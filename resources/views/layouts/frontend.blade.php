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
            <div class="col-md-12">
                <header>
                    <a href="index.html">
                        <img src="{{ asset('themes/frontend/assets/images/logo.PNG') }}" />
                    </a>
                    <a href="index.html" class="bold side-link">
                        Check another serial <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                </header>
            </div>
            @yield('content')  
        </div>
            
        
        <footer>
            <small class="bold center">
                This system is a part of Telemed International, for additional information please visit <a
                    href="www.telemedint.net">www.telemedint.net</a> or call us <a href="tel:+2 0100 000 0000">+2 0100
                    000 0000</a>
            </small>
        </footer>
    </section>
    <script src="{{ asset('themes/frontend/js/site.js') }}"></script>
</body>

</html>