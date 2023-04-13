<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Web Monitoring</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link <?= ($title == 'Home') ? 'active' : ''; ?>" aria-current="page" href="/">Home</a>
        <?php if(session('log') !== true): ?>
        <a class="nav-link <?= ($title == 'Login') ? 'active' : ''; ?>" href="/login">Login</a>
        <a class="nav-link <?= ($title == 'Register') ? 'active' : ''; ?>" href="/register">Register</a>
        <?php else: ?>
        <a class="nav-link <?= ($title == 'Websites') ? 'active' : ''; ?>" href="/daftar-website">Daftar Website</a>
        <a class="nav-link" href="/logout">Logout</a>
        <?php endif ?>
      </div>
    </div>
  </div>
</nav>