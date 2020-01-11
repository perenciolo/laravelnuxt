<template>
  <div class="container col-xs-12 mt-5">
    <h2>Create new Topic</h2>

    <form @submit.prevent="create">
      <div class="form-group">
        <label for="log-mail">Topic title</label>
        <input
          id="log-mail"
          v-model="form.title"
          type="text"
          class="form-control"
          aria-describedby="titleHelp"
          placeholder="Enter topic title"
          autofocus
        />
        <small
          id="titleHelp"
          :class="[
            errors && errors.title ? 'text-danger' : 'text-muted',
            'form-text'
          ]"
        >
          <template v-if="!errors || !errors.title">
            Nunca vamos compartilhar seu title, com ninguém.
          </template>
          <template v-if="errors && errors.title">
            <div v-for="(err, idx) in errors.title" :key="idx">
              {{ err }}
            </div>
          </template>
        </small>
      </div>
      <div class="form-group">
        <label for="log-body">Body</label>
        <textarea v-model="form.body" class="form-control" rows="5"></textarea>
        <small
          id="bodyHelp"
          :class="[
            errors && errors.body ? 'text-danger' : 'text-muted',
            'form-text'
          ]"
        >
          <template v-if="errors && errors.body">
            <div v-for="(err, idx) in errors.body" :key="idx">
              {{ err }}
            </div>
          </template>
        </small>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>
</template>
<script>
export default {
  middleware: ['auth'],
  data() {
    return {
      form: {
        title: '',
        body: ''
      }
    }
  },
  methods: {
    async create() {
      try {
        await this.$axios.$post('/topics', this.form)
        this.form.title = ''
        this.form.body = ''
        return this.$router.push('/profile')
      } catch (error) {}
    }
  }
}
</script>
