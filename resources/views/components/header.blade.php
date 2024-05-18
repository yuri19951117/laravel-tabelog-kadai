<nav class="navbar navbar-expand-md navbar-light shadow-sm nagoyameshi-header-container">

<div class="logo">
    <a href="{{ url('/') }}"><img src="{{ asset('img/NAGOYAMESHI.jpg')}}" width="300" height="100"></a>
</div>  
        <form action="{{ route('stores.index') }}" method="GET" class="row g-1">
            <div class="col-auto">
                <input class="form-control nagoyameshi-header-search-input" name="keyword">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn nagoyameshi-header-search-button"><i class="fas fa-search nagoyameshi-header-search-icon"></i></button>
            </div>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mr-5 mt-2">

            <li class="nav-item mr-5">
                <a class="nav-link" href="{{ route('profile.show') }}">
                    会社情報
                </a>
            </li>

                @guest
                    <li class="nav-item mr-5">
                        <a class="nav-link" href="{{ route('register') }}">会員登録</a>
                    </li>
                    <li class="nav-item mr-5">
                        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                    </li>
                    <hr>

                @else
                
                    <li class="nav-item mr-5">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            ログアウト
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                          <li class="nav-item mr-5">
                         <a class="nav-link" href="{{ route('mypage.favorite') }}">
                             お気に入り
                        </a>
                   </li>

                   <li class="nav-item mr-5">
                         <a class="nav-link" href="{{ route('mypage') }}">
                             マイページ
                        </a>
                   </li>



                @endguest
            </ul>
        </div>
    </div>
</nav>
