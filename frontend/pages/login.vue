<template>
  <div class="container col-xs-12 mt-5">
    <h2>Login</h2>

    <form>
      <div class="form-group">
        <label for="log-mail">Endereço de email</label>
        <input
          id="log-mail"
          type="email"
          class="form-control"
          aria-describedby="emailHelp"
          placeholder="Seu email"
        />
        <small id="emailHelp" class="form-text text-muted"
          >Nunca vamos compartilhar seu email, com ninguém.</small
        >
      </div>
      <div class="form-group">
        <label for="log-pass">Senha</label>
        <input
          id="log-pass"
          type="password"
          class="form-control"
          placeholder="Senha"
        />
      </div>
      <div class="form-group form-check">
        <input id="log-save" type="checkbox" class="form-check-input" />
        <label class="form-check-label" for="log-save">Clique em mim</label>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <p class="mt-3">
      Don't have account? <nuxt-link to="/register">Register</nuxt-link>
    </p>
  </div>
</template>

<script>
export default {}
</script>

<style></style>
