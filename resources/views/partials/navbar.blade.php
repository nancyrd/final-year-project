<nav class="nav">
  <div class="nav-inner container">
    <a href="{{ route('dashboard') }}" class="brand">
      <span class="brand-badge">🐍</span>
      <span class="brand-title">PYTHON QUEST</span>
    </a>

    <button class="nav-toggle" type="button" aria-label="Toggle navigation" data-nav-toggle>☰</button>

    <div class="nav-links" data-nav-links>
      <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
      <a class="nav-link {{ request()->is('stage/*') ? 'active' : '' }}" href="{{ route('stage.pre-assessment', ['stageName' => 'variables']) }}">Stages</a>
      <a class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}" href="{{ route('profile.edit') }}">Profile</a>
      <a class="nav-link {{ request()->routeIs('support') ? 'active' : '' }}" href="{{ route('support') }}">Help</a>

      @auth
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
          @csrf
          <button class="nav-link" style="background:#f7f4fe;border:none;cursor:pointer" type="submit">Log out</button>
        </form>
      @else
        <a class="nav-link" href="{{ route('login') }}">Log in</a>
      @endauth
    </div>
  </div>
</nav>
