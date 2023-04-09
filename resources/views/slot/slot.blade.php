<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Slot Machine</title>

    <meta name="Title" content="Slot Machine" />
    <meta name="description"
        content="Slot Machine is a HTML5 game where you pull the machine with three or more reels which spin and win credit, build your own slot game through this interesting game themes and attractive animation.">
    <meta name="keywords"
        content="slot, machine, reel, fruits, point, gamble, jackpot, lose, lucky, bingo, spin, credit, wins">

    <!-- for Facebook -->
    <meta property="og:title" content="Slot Machine" />
    <meta property="og:site_name" content="Slot Machine" />
    <meta property="og:image" content="http://demonisblack.com/code/2019/slotmachine/game/share.jpg" />
    <meta property="og:url" content="http://demonisblack.com/code/2019/slotmachine/game/" />
    <meta property="og:description"
        content="Slot Machine is a HTML5 game where you pull the machine with three or more reels which spin and win credit, build your own slot game through this interesting game themes and attractive animation.">

    <!-- for Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Slot Machine" />
    <meta name="twitter:description"
        content="Slot Machine is a HTML5 game where you pull the machine with three or more reels which spin and win credit, build your own slot game through this interesting game themes and attractive animation." />
    <meta name="twitter:image" content="http://demonisblack.com/code/2019/slotmachine/game/share.jpg" />

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <script>
        if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
            var msViewportStyle = document.createElement("style");
            msViewportStyle.appendChild(
                document.createTextNode(
                    "@-ms-viewport{width:device-width}"
                )
            );
            document.getElementsByTagName("head")[0].
            appendChild(msViewportStyle);
        }
    </script>

    <link rel="shortcut icon" href="{{ asset('icon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('js/vendor/modernizr-2.6.2.min.js') }}"></script>
</head>

<body>
    <!-- PERCENT LOADER START-->
    <div id="mainLoader"><img src="{{ asset('assets/loader.png') }}" /><br><span>0</span></div>
    <!-- PERCENT LOADER END-->

    <!-- CONTENT START-->
    <div id="mainHolder">

        <!-- BROWSER NOT SUPPORT START-->
        <div id="notSupportHolder">
            <div class="notSupport">YOUR BROWSER ISN'T SUPPORTED.<br />PLEASE UPDATE YOUR BROWSER IN ORDER TO RUN THE
                GAME</div>
        </div>
        <!-- BROWSER NOT SUPPORT END-->

        <!-- ROTATE INSTRUCTION START-->
        <div id="rotateHolder">
            <div class="mobileRotate">
                <div class="rotateDesc">
                    <div class="rotateImg"><img src="{{ asset('assets/rotate.png') }}" /></div>
                    Rotate your device <br />to landscape
                </div>
            </div>
        </div>
        <!-- ROTATE INSTRUCTION END-->

        <!-- CANVAS START-->
        <div id="canvasHolder">
            <canvas id="gameCanvas" width="768" height="1024"></canvas>
        </div>
        <!-- CANVAS END-->

    </div>
    <!-- CONTENT END-->

    <script type="text/javascript">
        var asset_url = '{{ config('app.url') }}'; //Asset URL

        var creditAmount = {{ Auth()->user()->credit }}; //game start credit

        var encrypt = '{{ encrypt( Auth()->user()->id ) }}';

        var rate = {{ $control->win_rate }};
    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery.min.js') }}"><\/script>')
    </script>

    <script src="{{ asset('js/vendor/detectmobilebrowser.js') }}"></script>
    <script src="{{ asset('js/vendor/createjs.min.js') }}"></script>
    <script src="{{ asset('js/vendor/TweenMax.min.js') }}"></script>

    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/sound.js') }}"></script>
    <script src="{{ asset('js/canvas.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/game.js') }}"></script>
    <script src="{{ asset('js/mobile.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/loader.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script>
</body>


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-EHXBWENQK0"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-EHXBWENQK0');
</script>


</html>
