<template>
  <div class="container col-xs-12 mt-5">
    <h2>Register</h2>

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
        <label for="log-name">Name</label>
        <input
          id="log-name"
          v-model.trim="form.name"
          type="text"
          class="form-control"
          placeholder="Seu nome"
        />
        <small id="emailHelp" class="form-text text-muted"
          >Nunca vamos compartilhar seu email, com ninguém.</small
        >
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
      <div class="form-group">
        <label for="log-pass">Password Confirm</label>
        <input
          id="log-pass-conf"
          v-model.trim="form.passwordConfirm"
          type="password"
          class="form-control"
          placeholder="Senha"
        />
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <p class="mt-3">
      Already have an account? <nuxt-link to="/login">Login</nuxt-link>
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
        name: '',
        password: '',
        passwordConfirm: ''
      }
    }
  },
  methods: {
    async submit() {
      await this.$axios.$post('register', this.form)
      await this.$auth.loginWith('local', {
        data: {
          email: this.form.email,
          password: this.form.password
        }
      })
      // redirect
      this.$router.push({
        path: this.$route.query.redirect || '/profile'
      })
    }
  }
}
</script>

<style></style>
