<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>

<body>
    <header>
        <div id="head">
            <!-- Atlasタグ -->
            <h1><a href="/top"><img src="{{ asset('images/atlas.png')}}" class="head-images"></a></h1>
            <div id="headAccordion">
                <div class="atlas-accordion is-active">
                    <p class="head-name">{{ Auth::user()->username}}さん</p>
                    <img class="logo" src="{{ asset('storage/images/' . Auth::user()->images) }}">
                </div>
            </div>
        </div>
    </header>
    <ul class="atlas-accordion-ul">
        <li class="atlas-accordion-li"><a href=" /top">HOME</a></li>
        <li class="atlas-accordion-middle"><a href=" /profile">プロフィール編集</a></li>
        <li class="atlas-accordion-li"><a href="/logout">ログアウト</a></li>
    </ul>

    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <div id="side-bar">
            <div id="confirm">

                <p>{{ Auth::user()->username}}さん</p>
                <div class="side-follow-list">
                    <p>フォロー数</p>
                    <p>{{ Auth::user()->follows()->count() }}名</p>
                </div>

                <p class="list-btn"><a href="/follow-list">フォローリスト</a></p>

                <div class="side-follow-list">
                    <p>フォロワー数</p>
                    <p>{{ Auth::user()->followers()->count() }}名</p>
                </div>

                <p class="list-btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="side-search"><a href="/search">ユーザー検索</a></p>

        </div>
    </div>
    <footer>
    </footer>
    <!-- JSのリンク設定 -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js') }}"></script>
</body>

</html>
