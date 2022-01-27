

<!-- Start menu section -->
<section id="aa-menu-area">
    <nav class="navbar navbar-default main-navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- LOGO -->
                <!-- Text based logo -->
                {{-- <a class="navbar-brand aa-logo" href="/"> Pushpa<span>Kamal</span></a> --}}
                <!-- Image based logo -->
               <a class="navbar-brand aa-logo-img" href="/"><img src="{{asset("img/logo/logonew.png")}}" alt="logo"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
                    <li class="{{ (request()->is('en'))||(request()->is('ne')) ? 'active' : '' }}"><a class="nav-link" href="/">Home</a></li>
                    {{-- <li class="dropdown">
              <a class="nav-link" class="dropdown-toggle" data-toggle="dropdown" href="properties.html">PROPERTIES <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">                
                <li><a class="nav-link" href="properties.html">PROPERTIES</a></li>
                <li><a class="nav-link" href="properties-detail.html">PROPERTIES DETAIL</a></li>                                            
              </ul>
            </li> --}}
                    <li class="{{ (request()->is('en/sale'))|| (request()->is('ne/sale')) ? 'active' : '' }}"><a class="nav-link" href="/sale">Buy</a></li>
                    <li class="{{ (request()->is('en/rent'))|| (request()->is('ne/rent')) ? 'active' : '' }}"><a class="nav-link" href="/rent">Rent</a></li>
                    <li class="{{ ((request()->is('en/property/*')) || (request()->is('en/search'))|| (request()->is('en/properties'))
                    || (request()->is('ne/recent'))|| (request()->is('en/popular'))
                    ) || ((request()->is('ne/property/*')) || (request()->is('ne/search'))|| (request()->is('ne/properties'))
                    || (request()->is('ne/recent'))|| (request()->is('ne/popular'))
                    ) ? 'active' : '' }}"><a class="nav-link" href="/properties">Properties</a></li>
                  
                    {{-- <li class="dropdown">
              <a class="nav-link" class="dropdown-toggle" data-toggle="dropdown" href="blog-archive.html">BLOG <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">                
                <li><a class="nav-link" href="blog-archive.html">BLOG</a></li>
                <li><a class="nav-link" href="blog-single.html">BLOG DETAILS</a></li>                                            
              </ul>
            </li> --}}
                    <li class="{{ (request()->is('en/about-us'))||(request()->is('ne/about-us')) ? 'active' : '' }}"><a class="nav-link" href="/about-us">About-us</a></li>
                    <li class="{{  "en/pricing"==request()->path() ||"ne/pricing"==request()->path() ? 'active' : '' }}"><a class="nav-link" href="{{ url('pricing') }}">Pricing</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
</section>
<!-- End menu section -->
