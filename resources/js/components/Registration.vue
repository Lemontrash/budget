<template>
  <div class="registration">
    <div class="form-wrapper">
      <form action="">

        <div class="form-group-row">
          <label>
            <p>Full Name</p>
            <input
              type="text"
              v-model="userData.name"
              name="name"
              id="name"
              minlength="3"
            >
          </label>
        </div>

        <div class="form-group-row">
          <label>
            <p>Email</p>
            <input
              type="email"
              v-model="userData.email"
              name="email"
              minlength="8"
            >
          </label>
        </div>

        <div class="form-group-row">
          <label>
            <p>Phone Number</p>
            <input
              type="number"
              v-model="userData.phone"
              name="phone"
              minlength="5"
            >
          </label>
        </div>

        <div class="form-group-row">
          <label>
            <p>Password</p>
            <input
              type="password"
              @input="validatePassword"
              v-model="userData.password"
              name="password"
              minlength="6"
            >
          </label>
        </div>

        <div class="form-group-row">
          <label>
            <p>Confirm Password</p>
            <input
              type="password"
              @input="validatePassword"
              v-model="userData.password_confirmation"
              name="password_confirmation"
              minlength="6"
            >
          </label>
        </div>

        <div class="notice" >
          <span v-if="notice">{{ notice }}</span>
        </div>

        <div class="privacy-policy">
          <label>
            <input type="checkbox" v-model="confirm">
            <span>I agree with <b>Terms and contitions</b></span>
          </label>
        </div>

        <button
          @submit.prevent="onSubmit"
          onclick="event.preventDefault()"
          @click="createUser()"
          class="btn big-btn"
          :class="{disabled : notice}"
        >
          Sign up!
        </button>



      </form>
    </div>

  </div>
</template>

<script>
export default {
  data() {
    return {
      userData : {
        name : '',
        password : '',
        password_confirmation : '',
        email : '',
        phone : '',
      },
      notice : false,
      confirm : false,
      validateData : false,


    }
  },
  methods : {
    createUser() {

      //validate user data
      this.validateData = true;
      //check if all validated
      let validation = false;
      if(this.confirm == true && this.validatePassword() == true && this.validateData == true) {
        validation = true;
        console.log(validation);
      }
      if(validation == true) {
        //register user
        axios
          .post('/api/auth/signup',this.userData)
            .then(res => {
              console.log(res);
              //Login user after successfull registration
              axios
                .post('/api/auth/login',{
                  email : this.userData.email,
                  password : this.userData.password,
                  remember_me : false
                })
                .then(res => {
                  console.log(res);
                  this.$cookies.set('token',res.data.access_token,60*60*24*30);
                  document.location.reload(true);
                })
                .catch(error => {
                  console.log(error);
                });
            })
            .catch(error => {
              console.log(error);
            });
      }

    },
    validatePassword() {
      let pass1 = this.userData.password;
      let pass2 = this.userData.password_confirmation;
      //check password length
      if(pass1.length > 40 || pass1.length < 6) {
        this.notice = 'Passwords are not correct, it must be from 6 to 40 symbols. FIX IT NOW!'
        return false;
      }
      else {
        //check if password match
        if(pass1 != pass2) {
          this.notice = 'Passwords don\'t match';
          return false;
        }
        this.notice = false;
        return true;
      }

    }
  }

}
</script>

<style lang="scss" scoped>
.registration {
  height:100%;
  .form-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding:16px 24px;
      width:320px;
      .form-group-row {
        width:100%;
        margin-bottom: 16px;
        label {
          display: flex;
          flex-direction: column;
          align-items: flex-start;
          p {
            margin: 0 0 6px 0;
            color: #333;
          }
          input {
            width: 100%;
          }
        }
      }
    }
  }
}
</style>
