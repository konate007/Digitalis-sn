<li class="nav-item">
    <a href="{{ route('formations.index') }}"
       class="nav-link {{ Request::is('formations*') ? 'active' : '' }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
        <p>Formations</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('services.index') }}"
       class="nav-link {{ Request::is('services*') ? 'active' : '' }}"><i class="fa fa-cog"></i>
        <p>Services</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('projets.index') }}"
       class="nav-link {{ Request::is('projets*') ? 'active' : '' }}"><i class="fas fa-project-diagram"></i>
        <p>Projets</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('partenaires.index') }}"
       class="nav-link {{ Request::is('partenaires*') ? 'active' : '' }}"><i class="fas fa-users"></i>
        <p>Partenaires</p>
    </a>
</li>


