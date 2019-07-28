<template>
  <div class="header">
    <div class="header-content">

      <router-link :to="'/'" class="logo">
        <img src="" alt="">
      </router-link>

      <nav class="main-menu">
      <router-link :to="'/'">Home</router-link>
      <router-link :to="'/'">EXAMPLE</router-link>
      <router-link :to="'/'">EXAMPLE</router-link>
      <router-link :to="'/'">EXAMPLE</router-link>

      </nav>

      <div class="user-actions">
        <router-link class="btn inverted" v-if="currentUser == false" :to="'/registration'">SignUp</router-link>
        <button class="btn" v-if="currentUser == false" @click="openLogin">Login</button>

        <router-link class="btn inverted" v-if="currentUser == true" :to="'/my-account'">My Account</router-link>
        <button class="btn" v-if="currentUser == true" @click="logout">Logout</button>
      </div>

      <button class="mobile-menu-trigger" @click="openMobileMenu($event)"><i class="far fa-bars"></i></button>

    </div>
    <modal v-if="openLoginModal" @close="closeLoginModal"><login/></modal>
  </div>

</template>

<script>
import Login from './Login.vue';
import Modal from './../modals/Modal.vue';
export default {
  data() {
    return {
      currentUser : false,
      openLoginModal : false,
    }
  },
  created() {
    // let user_token = this.$cookies.get('token');
    if(this.$cookies.get('token')) {
      axios
        .get('/api/user', {
          headers : {
            Accept : 'application/json',
            Authorization : 'Bearer '+this.$cookies.get('token'),
          }
        })
          .then(res=>{
            if(res.data.id) {
              this.currentUser = true;
            }
          })
          .catch(err=>{
            console.log(err);
          });
    }
    // this.getAllCategories();
  },
  methods : {
    openMobileMenu(e) {
      document.querySelector('.header').classList.toggle('is_active');
    },
    logout() {
      axios
        .get('api/auth/logout',{
          headers : {
            Accept : 'application/json',
            Authorization : 'Bearer ' + this.$cookies.get('token'),
          }
        })
          .then(res => {
            console.log(res);
            if(res.data.success) {
              this.$cookies.remove('token');
              document.location.reload(true);
            }
          })
          .catch(err => {console.log(err);})
    },
    openLogin() {
      this.openLoginModal = true;
    },
    closeLoginModal(value) {
      this.openLoginModal = value;
    }
  },
  components : {
    Login,
    Modal,
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
  background-color: #f8fafc;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  z-index: 5;
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
    .mobile-menu-trigger {
      display: none;
      outline:none;
      background-color: transparent;
      border-style:hidden;
      font-size: 32px;
      i {
        pointer-events: none;
      }
    }
    .logo {
      width:160px;
      height:80px;
      flex-basis:20%;
      background-color: cornflowerblue;
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
      .btn {
        display: block;
        margin-left:16px;
      }
    }
  }

}

@media (max-width:900px) {
  .header {
    height:76px;
    transition: .3s;
    .header-content {
      .mobile-menu-trigger {
        display: block;
        transition: .3s;
      }
      .logo {
        height:60px;
        flex-basis:unset;
        width:100px;
        transition: .3s;
      }
      nav.main-menu {
        display: none;
        transition: .3s;
      }
      .user-actions {
        display: none;
        transition: .3s;
      }
    }
    &.is_active {
      height:100vh;
      .header-content {
        flex-direction: row;
        flex-wrap:wrap;
        align-items: flex-start;
        justify-content: center;
        .logo {
          order: 1;
          flex-basis:50%;
          max-width:100px;
          img {
            width:100px;
          }
        }
        .mobile-menu-trigger {
          order: 2;
          flex-basis:50%;
          display: flex;
          justify-content: flex-end;
          align-items: center;
          height: 60px;
          flex-grow:2;
        }
        nav.main-menu {
          flex-basis:100%;
          order: 3;
          display: flex;
          flex-direction: column;
          margin: 0;
          align-items: center;
          justify-content: center;
          a {
            margin: 8px 0;
            font-size: 20px;
          }
        }
        .user-actions {
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          order:4;
          .btn {
            margin:0 0 12px 0;
          }
        }
      }
    }
  }
}
</style>
