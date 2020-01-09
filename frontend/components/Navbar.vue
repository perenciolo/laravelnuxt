<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <nuxt-link to="/" class="navbar-brand">Frontend</nuxt-link>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Alterna navegação"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarNav" class="collapse navbar-collapse">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <nuxt-link to="/" class="nav-link">Home</nuxt-link>
        </li>
        <li class="nav-item">
          <nuxt-link to="/" class="nav-link">Posts</nuxt-link>
        </li>
        <li class="nav-item">
          <nuxt-link to="/" class="nav-link">Blog</nuxt-link>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <nuxt-link to="/register" class="nav-link">Register</nuxt-link>
        </li>
        <li class="nav-item">
          <nuxt-link to="/login" class="nav-link">Login</nuxt-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {}
</script>
