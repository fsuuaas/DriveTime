<ul class="navigation clearfix">
    <li class="{{ request()->routeIs('index') ? 'current' : '' }}">
        <a href="{{route('index')}}">Home</a>
    </li>
    <li class="{{ request()->routeIs('about') ? 'current' : '' }}">
        <a href="{{route('about')}}">About</a>
    </li>
    <li class="{{ request()->routeIs('cars') ? 'current' : '' }}">
        <a href="{{route('cars')}}">Cars</a>
    </li>
    <li class="{{ request()->routeIs('contact') ? 'current' : '' }}">
        <a href="{{route('contact')}}">Contact us </a>
    </li>
</ul>
