<template>
  <div class="login">
    <div class="form-wrapper">
      <form action="">

        <div class="form-group-row">
          <label>
            <p>Email</p>
            <input
              type="email"
              v-model="email"
              name="email"
              minlength="6"
            >
          </label>
        </div>

        <div class="form-group-row">
          <label>
            <p>Password</p>
            <input
              type="password"
              v-model="password"
              name="password"
              minlength="6"
            >
          </label>
        </div>

        <button
        @submit.prevent="onSubmit"
        onclick="event.preventDefault()"
        class="btn"
        @click="login"
        >
          Login
        </button>

      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email : null,
      password : null,
    }
  },
  methods : {
    login() {
      axios
        .post('/api/auth/login',{
          email : this.email,
          password : this.password,
          remember_me : false
        })
        .then(res => {
          // console.log(res);
          this.$cookies.set('token',res.data.access_token,60*60*24*30);
          document.location.reload(true)
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
}
</script>

<style lang="scss" scoped>
</style>
