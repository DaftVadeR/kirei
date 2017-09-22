<?php
$navLinks = [
    'Home' => ['url' => '/'],
    'Tags' => ['url' => '/'],
    'Trending' => ['url' => '/'],
    'Best of the best' => ['url' => '/'],
    'Login' => ['url' => '/', 'login' => true],
    'Register' => ['url' => '/', 'login' => false],
];
?><ul class="navbar-nav mr-auto">
    @foreach ($navLinks as $label => $navLink)
        <li class="nav-item {{ $navLink['url'] === Request::getRequestUri() ? 'active' : null }}">
            <a class="nav-link" href="{{ $navLink['url'] }}">{{ $label }}
                @if ($navLink['url'] === Request::getRequestUri() ? 'active')
                    <span class="sr-only">(current)</span>
                @endif</a>
        </li>
    @endforeach
    <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown04">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </li>
</ul>