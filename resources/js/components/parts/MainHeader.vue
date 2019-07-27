<template>
  <div class="header">
    <div class="header-content">

      <router-link :to="'/'" class="logo">
        <img src="" alt="Here must be some image">
      </router-link>

      <nav class="main-menu">
      <router-link :to="'./'">Home</router-link>

      </nav>

      <div class="user-actions">
        <router-link class="btn inverted" v-if="currentUser == false" :to="'/registration'">SignUp</router-link>
        <button class="btn" v-if="currentUser == false" @click="openLogin">Login</button>

        <router-link v-if="currentUser == true" :to="'/my-account'">My Account</router-link>
        <button class="btn" v-if="currentUser == true" @click="logout">Logout</button>
      </div>

    </div>
  </div>
</template>

<script>
import Login from './Login.vue';

export default {
  data() {
    return {
      currentUser : false,
    }
  },
  created() {
    // TODO: check if user logged in
  },
  methods : {
    logout() {
      // TODO: logout button event
    },
    openLogin() {
      this.$modal.show(Login, {}, {

      });
      console.log('OpenLogin');
    }
  },
  components : {
    Login,
  }

}
</script>

<style lang="scss" scoped>
.header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 80px;

  .header-content {
    width:100%;
    height:100%;
    max-width: 1440px;
    padding: 8px 24px;
    margin: 0 auto;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    .logo {
      width:160px;
      height:80px;
      flex-basis:20%;
      img {
        width:100%;
        height:100%;
        object-fit: cover;
        display: block;
      }
    }
    nav.main-menu {
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
      flex-grow: 2;
      padding:0 16px;
      a {
        display: block;
        margin: 0 8px;
        color: #333;
        font-size: 18px;
      }
    }
    .user-actions {
      display: flex;
      flex-direction: row;
      align-items: center;
      flex-basis:20%;
    }
  }

}
</style>
