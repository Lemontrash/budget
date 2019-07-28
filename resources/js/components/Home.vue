<template>
  <div class="home">

    <add-activity class="component half" />
    <chart class="component half" />
    <last-activities class="component full" />
  </div>
</template>

<script>
import Chart from './dashboard/Chart.vue'
import AddActivity from './dashboard/AddActivity.vue'
import LastActivities from './dashboard/LastActivities.vue'


export default {
  data() {
    return {}
  },
  components : {
    Chart,
    AddActivity,
    LastActivities,
  }
}
</script>

<style lang="scss" scoped>
.home {
  display: flex;
  flex-direction: row;
  flex-wrap : wrap;
  justify-content:space-between;
  .component {
    width:100%;
    border-radius: 10px;
    background-color: #f8fafc;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    padding:16px 24px;
    &.full {
      flex-basis:100%;
      margin:16px 0;
    }
    &.half {
      flex-basis: calc(50% - 8px);
    }
  }

}
</style>
