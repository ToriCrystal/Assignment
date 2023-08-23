@if ($listloai != null)
    <nav class="main-menu">
        <ul>
            <li class="current-list-item"><a href="/">Home</a>
            </li>
            <li><a href="about.html">About us</a></li>
            <li><a href="news.html">News</a>
                <ul class="sub-menu">
                    <li><a href="news.html">News</a></li>
                    <li><a href="single-news.html">Single News</a></li>
                </ul>
            </li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="/product">Product</a>
                <ul class="sub-menu">
                    @foreach ($listloai as $brain)
                        <li><a href="/category/{{ $brain->id_loai }}">{{ $brain->ten_loai }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li>
            <li><a class="shopping-cart" href="/profile"><i class="fas fa-user"></i>
                    @if (Auth::check())
                        {{ Auth::user()->name }}
                </a></a>
                <ul class="sub-menu">
                    <div class="header-icons">
                        <a href="/cart"><i class="fas fa-shopping-cart"></i></a>
                        @if (Auth::user()->role == 1)
                            <a href="/admin">Quản trị website</a>
                        @endif
                        @if (Auth::check())
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="nav-link"
                                    onclick="event.preventDefault();
                                                            this.closest('form').submit();"
                                    style="margin-left: 0%">
                                    &ensp;{{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @endif
                        </a>

@endif
</div>
</ul>
</li>
</li>

</ul>
</nav>

@endif
