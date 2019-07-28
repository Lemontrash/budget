Vue.mixin({
  data() {
    return {
      user_token : this.$cookies.get('token'),
    }
  },
  methods: {
    // getAllCategories : function () {
    //   console.log(this.user_token);
    //   axios.post('/api/getAllCategories',{
    //     headers : {
    //       Accept : 'application/json',
    //       Authorization : 'Bearer '+this.user_token,
    //     }
    //   })
    //     .then(res=>{
    //       console.log(res);
    //     })
    //   return this.user_token;
    // },
    // getCurrentUser : function () {
    //   return new Promise((resolve,reject) => {
    //     if(this.user_token) {
    //       axios
    //         .get('/api/user', {
    //           headers : {
    //             Accept : 'application/json',
    //             Authorization : 'Bearer ' + this.user_token,
    //           }
    //         })
    //           .then(res=>{
    //             if(res.data.id) {
    //               resolve(res.data.id);
    //             }
    //           })
    //           .catch(err=>{
    //             console.log(err);
    //             reject(false);
    //           });
    //     }
    //   });
    // }
  }
});
