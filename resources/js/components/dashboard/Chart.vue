<template>
  <div class="chart">
    <h2>Last month chart</h2>
    <div>
      <apexchart type=pie width=380 :options="chartOptions" :series="series" />
    </div>
  </div>
</template>

<script>

export default {
  data() {
    return {
      series: [44, 55, 13, 43, 22],
      chartOptions: {
        labels: ['Transport', 'Medicine', 'Culture', 'Food', 'Girls'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
      },
      fill: {
        type: 'gradient',
      },
    }
  },
  created() {
    // TODO: Get chart data
  }
}
</script>

<style lang="css" scoped>
</style>
