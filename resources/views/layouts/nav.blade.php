<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">

        @if( strpos(url()->current(), 'login') == false && strpos(url()->current(), 'register') == false )
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <b>Express</b>Buffet
                </a>

                <button type='button' class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="glyphicon glyphicon-user" style="color: #5e5e5e;"></span>
                </button>
            </div>

            <ul class="nav navbar-nav navbar-right collapse navbar-collapse">
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Sign Up</a></li>
            </ul>
        @else
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <b>Express</b>Buffet
                </a>
            </div>
        @endif

        </div>
    </nav>
</div>