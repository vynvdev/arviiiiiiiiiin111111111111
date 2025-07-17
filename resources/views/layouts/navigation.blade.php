<nav x-data="{ open: false }" class="navbar">
  <div class="navbar-container">
    <div class="navbar-left">
      <a href="{{ route('dashboard') }}" class="navbar-brand">
        <x-application-logo class="navbar-logo" />
        <span class="navbar-title">Bookr</span>
      </a>
      <div class="navbar-links">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link">
          {{ __('Dashboard') }}
        </x-nav-link>
      </div>
    </div>

    <div class="navbar-right">
      <span class="navbar-user">{{ Auth::user()->name }}</span>
      <x-dropdown align="right" width="48">
        <x-slot name="trigger">
          <button class="dropdown-toggle">
            <svg class="dropdown-icon" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
          </button>
        </x-slot>

        <x-slot name="content">
          <x-dropdown-link :href="route('profile.edit')">
            {{ __('Profile') }}
          </x-dropdown-link>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
              {{ __('Log Out') }}
            </x-dropdown-link>
          </form>
        </x-slot>
      </x-dropdown>
    </div>

    <div class="navbar-toggle">
      <button @click="open = ! open" class="hamburger">
        <svg class="hamburger-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>

  <div :class="{ 'block': open, 'hidden': !open }" class="mobile-menu">
    <div class="mobile-links">
      <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link">
        {{ __('Dashboard') }}
      </x-responsive-nav-link>
    </div>
    <div class="mobile-user">
      <div class="user-name">{{ Auth::user()->name }}</div>
      <div class="user-email">{{ Auth::user()->email }}</div>
    </div>
    <div class="mobile-options">
      <x-responsive-nav-link :href="route('profile.edit')" class="nav-link">
        {{ __('Profile') }}
      </x-responsive-nav-link>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link logout">
          {{ __('Log Out') }}
        </x-responsive-nav-link>
      </form>
    </div>
  </div>
</nav>

<style>
  .navbar {
    background: linear-gradient(to right, #2d2d2d, #1f1f1f);
    border-bottom: 1px solid #3d3d3d;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  }
  .navbar-container {
    max-width: 1200px;
    margin: auto;
    padding: 0 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 64px;
  }
  .navbar-left {
    display: flex;
    align-items: center;
  }
  .navbar-brand {
    display: flex;
    align-items: center;
    text-decoration: none;
  }
  .navbar-logo {
    height: 32px;
    width: 32px;
    color: #7c3aed;
  }
  .navbar-title {
    font-size: 1.25rem;
    font-weight: bold;
    color: white;
    margin-left: 0.5rem;
  }
  .navbar-links, .mobile-links {
    display: flex;
    gap: 1.5rem;
  }
  .nav-link {
    color: white;
    text-decoration: none;
    transition: color 0.3s ease;
  }
  .nav-link:hover {
    color: #7c3aed;
  }
  .navbar-user, .user-name, .user-email {
    color: white;
  }
  .dropdown-toggle {
    background: none;
    border: none;
    cursor: pointer;
  }
  .dropdown-icon {
    height: 20px;
    width: 20px;
  }
  .navbar-toggle {
    display: none;
  }
  .mobile-menu {
    display: none;
    background-color: #1f1f1f;
    border-top: 1px solid #3d3d3d;
    padding: 1rem;
  }
  .mobile-user {
    padding-top: 1rem;
    border-top: 1px solid #3d3d3d;
  }
  .logout {
    color: #f87171;
  }
  @media (max-width: 640px) {
    .navbar-links,
    .navbar-right {
      display: none;
    }
    .navbar-toggle {
      display: block;
    }
    .mobile-menu {
      display: block;
    }
  }
</style>
