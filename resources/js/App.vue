<template>
  <main>
    <main-header />
    <router-view></router-view>
    <!-- <passport-clients></passport-clients>
    <passport-authorized-clients></passport-authorized-clients>
    <passport-personal-access-tokens></passport-personal-access-tokens> -->
  </main>
</template>

<script>
import Home from './components/Home.vue';
import MainHeader from './components/parts/MainHeader.vue';

export default {
  data() {
    return {}
  },
  components : {
    Home, MainHeader,
  },


}
</script>

<style lang="scss" scoped>
main {
  max-width:1440px;
  padding:96px 24px 0;
  margin:0 auto;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}
@media (max-width:900px) {
  main {
    padding:76px 12px 0;
  }
}
</style>
