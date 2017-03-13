{{-- Navigation --}}
<nav>
    <div class="nav-wrapper">
        <a href="/" class="brand-logo">
            <img src="/storage/images/header-logo.svg" alt="CoMC Logo" title="College of Media &amp; Communication" />
        </a>

        <ul id="slide-out" class="side-nav">
            @if($teamMember)
                <li><a href="/user-portal/{{ $teamMember->eraiderID }}">Profile</a></li>
                <li><a href="https://eraider.ttu.edu/signout.asp">Logout</a></li>
            @endif
        </ul>

        <ul class="right hide-on-med-and-down">
            @if($teamMember)
                <li><a href="/user-portal/{{ $teamMember->eraiderID }}"><i class="small material-icons left">perm_identity</i>Profile</a></li>
                <li><a href="https://eraider.ttu.edu/signout.asp">Logout</a></li>
            @endif
        </ul>

        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
{{-- End of navigation --}}
