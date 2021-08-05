<!-- Left Side Of Navbar -->

<li class="dropdown">
    <a href="#"
       class="dropdown-toggle @if (Request::segment(1) == 'offers' || Request::segment(1) == 'offer') current-section @endif"
       data-toggle="dropdown"
       role="button"
       aria-expanded="false">
        Offers
    </a>

    <ul class="dropdown-menu" role="menu">
        @can('store_offer')<li><a href="/offer">Create</a></li>@endcan
        <li><a href="/offers">View All</a></li>
        <li><a href="/offers/archived">View Archived</a></li>
    </ul>
</li>

<li class="dropdown">
    <a href="#"
       class="dropdown-toggle @if (Request::segment(1) == 'banners' || Request::segment(1) == 'banner')) current-section @endif"
       data-toggle="dropdown"
       role="button"
       aria-expanded="false">
        Banners
    </a>

    <ul class="dropdown-menu" role="menu">
        @can('store_banner')<li><a href="/banner">Create</a></li>@endcan
        <li><a href="/banners">View All</a></li>
        <li><a href="/banners/archived">View Archived</a></li>
        <li><a href="/reports">View Reports</a></li>
    </ul>
</li>

@if (Spark::developer(Auth::user()->email))
    <li class="dropdown">
        <a href="#"
           class="dropdown-toggle @if (Request::segment(1) == 'templates' || Request::segment(1) == 'template' || Request::segment(1) == 'themes' || Request::segment(1) == 'theme' || Request::segment(1) == 'options' || Request::segment(1) == 'option' || Request::segment(1) == 'option-types' || Request::segment(1) == 'option-type')) current-section @endif"
           data-toggle="dropdown"
           role="button"
           aria-expanded="false">
            Admin
        </a>

        <ul class="dropdown-menu" role="menu">
            <li><a href="/settings#/teams">Team Details</a></li>
            <li><a href="/templates">Templates</a></li>
            <li><a href="/themes">Themes</a></li>
            <li><a href="/options">Options</a></li>
            <li><a href="/option-types">Option Types</a></li>
        </ul>
    </li>
@endif
