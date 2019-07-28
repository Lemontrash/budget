<template>
  <div class="last-activities">
    <h2>Last activities</h2>
    <ul class="activities">
      <li class="activity" v-for="i in 10">
        {{i}}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="scss" scoped>
.last-activities {

  .activities {
    margin: 0;
    padding: 0;
    border:1px solid #e0e0e0;
    padding-top: 4px;
    border-radius: 10px;
    .activity {
      list-style-type: none;
      margin-bottom: 4px;
      border-bottom:1px solid #e0e0e0;
      padding:4px 12px;
      &:last-child {
        border-bottom-width:0;
      }
    }
  }

}
</style>
