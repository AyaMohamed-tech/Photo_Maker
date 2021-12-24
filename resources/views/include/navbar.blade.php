<nav class="navbar navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                    <span class="fa fa-bars"></span>
                </button>

                <a href="home" class="navbar-brand hidden-sm hidden-md hidden-lg"><img src="../frontend/images/logo.png" alt="LOGO"></a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right text-align-left">
                    <li class="active"><a href="home">{{ __('messages.home') }}</a></li>
                    <li><a href="about">{{ __('messages.aboutus') }}</a></li>
                    <li><a href="services">{{ __('messages.services') }}</a></li>
                </ul>

                <a href="home" class="navbar-brand hidden-xs text-center"><img src="../frontend/images/logo.png" alt="LOGO"></a>

                <ul class="nav navbar-nav navbar-left text-align-right">
                    <li><a href="gallery">{{ __('messages.gallery') }}</a></li>
                    <li><a href="contact">{{ __('messages.contactus') }}</a></li>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li><a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</nav>