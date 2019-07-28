<template>
  <main>
    <main-header />
    <router-view></router-view>
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
</style>
