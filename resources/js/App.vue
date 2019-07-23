<template>
  <div>
    MAIN APP
    <router-view></router-view>
    <router-link :to="'/registration'">reg</router-link>
    <router-link :to="'/'">home</router-link>
  </div>
</template>

<script>
import Home from './components/Home.vue';

export default {
  data() {
    return {}
  },
  components : {
    Home
  }
}
</script>

<style lang="scss" scoped>

</style>
