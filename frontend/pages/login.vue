<template>
  <div class="container col-xs-12 mt-5">
    <h2>Login</h2>

    <form @submit.prevent="submit">
      <div class="form-group">
        <label for="log-mail">Endereço de email</label>
        <input
          id="log-mail"
          v-model.trim="form.email"
          type="email"
          class="form-control"
          aria-describedby="emailHelp"
          placeholder="Seu email"
          autofocus
        />
        <small
          id="emailHelp"
          :class="[
            errors && errors.email ? 'text-danger' : 'text-muted',
            'form-text'
          ]"
        >
          <template v-if="!errors || !errors.email">
            Nunca vamos compartilhar seu email, com ninguém.
          </template>
          <template v-if="errors && errors.email">
            <div v-for="(err, idx) in errors.email" :key="idx">
              {{ err }}
            </div>
          </template>
        </small>
      </div>
      <div class="form-group">
        <label for="log-pass">Senha</label>
        <input
          id="log-pass"
          v-model.trim="form.password"
          type="password"
          class="form-control"
          placeholder="Senha"
        />
        <small
          id="passwordHelp"
          :class="[
            errors && errors.password ? 'text-danger' : 'text-muted',
            'form-text'
          ]"
        >
          <template v-if="errors && errors.password">
            <div v-for="(err, idx) in errors.password" :key="idx">
              {{ err }}
            </div>
          </template>
        </small>
      </div>
      <div class="form-group form-check">
        <input id="log-save" type="checkbox" class="form-check-input" />
        <label class="form-check-label" for="log-save">Clique em mim</label>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <p class="mt-3">
      Don't have account?
      <nuxt-link to="/register">Register</nuxt-link>
    </p>
  </div>
</template>

<script>
export default {
  middleware: ['guest'],
  data() {
    return {
      form: {
        email: '',
        password: ''
      }
    }
  },
  methods: {
    async submit() {
      try {
        await this.$auth.loginWith('local', {
          data: this.form
        })

        this.$router.push({
          path: this.$route.query.redirect || '/profile'
        })
      } catch (error) {}
    }
  }
}
</script>

<style></style>
