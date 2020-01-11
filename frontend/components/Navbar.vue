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
          <nuxt-link to="/profile" class="nav-link">Create Posts</nuxt-link>
        </li>
        <li class="nav-item">
          <nuxt-link to="/" class="nav-link">Blog</nuxt-link>
        </li>
      </ul>
      <template v-if="!authenticated">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <nuxt-link to="/register" class="nav-link">Register</nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link to="/login" class="nav-link">Login </nuxt-link>
          </li>
        </ul>
      </template>
      <template v-if="authenticated">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link">{{ user.name }}</a>
          </li>
          <li class="nav-item">
            <a @click.prevent="logout" class="nav-link">Logout</a>
          </li>
        </ul>
      </template>
    </div>
  </nav>
</template>

<script>
export default {
  methods: {
    logout() {
      this.$auth.logout()
    }
  }
}
</script>
