<!DOCTYPE html>
<html lang="en">

<x-meta-tags />

<body style="background: var(--gradient-background)">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">
  <div class="container">
    <a class="navbar-brand site-brand" href="/">
         <x-application-logo />
    </a>
  </div>
</nav>

@yield('content')
<!-- FOOTER -->
<footer class="py-3 text-center">
  <small>© 2025 Club UniTee. All rights reserved.</small>
</footer>

</body>
</html>
