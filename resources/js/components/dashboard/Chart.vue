<template>
  <div class="chart">
    <div>
      <apexchart width="380" type="pie" :options="options" :series="series"></apexchart>
    </div>
  </div>
</template>

<script>

export default {
  data: function() {
    return {
      options: {},
      series: [44, 55, 41, 17, 15]
    }
  },
  created() {
    // TODO: Get chart data
  }
}
</script>

<style lang="css" scoped>
</style>
