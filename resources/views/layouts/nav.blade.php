<nav class="navbar-expand-lg navbar navbar-dark bg-dark">
  <div class="collapse navbar-collapse ml-5" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ request()->is('clients*') ? 'active' : '' }}">
        <a class="nav-link" href="/clients">Klijenti <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item {{ request()->is('vehicles*') ? 'active' : '' }}">
        <a class="nav-link" href="/vehicles">Vozila</a>
      </li>
      <li class="nav-item {{ request()->is('reservations*') ? 'active' : '' }}">
        <a class="nav-link" href="/reservations">Rezervacije</a>
      </li>
      <li class="nav-item {{ request()->is('availability-search*') ? 'active' : '' }}">
        <a class="nav-link" href="/availability-search">Raspoloživa vozila</a>
      </li>
    </ul>
    <form action="/logout" method="POST" class="mr-5">
      @csrf
      <button class="btn" style="color: white;"><i class="fas fa-sign-out-alt mr-2"></i>Odjavi se</button>
    </form>
  </div>
</nav>