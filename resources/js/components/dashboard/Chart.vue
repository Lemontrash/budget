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
              width: 280
            },
            legend: {
              position: 'bottom'
            }
          }
        }],
        colors: ['#fc00ff', '#ee9ca7', '#525252', '#F1F2B5','#D1913C','#7b4397','#136a8a'],
        fill: {
          type: 'gradient',
          gradient: {
            shade: 'dark',
            type: "horizontal",
            // shadeIntensity: 1,
            gradientToColors: ['#00dbde','#ffdde1','#3d72b4','#135058','#FFD194','#dc2430','#267871'], // optional, if not defined - uses the shades of same color in series
            // inverseColors: true,
            // opacityFrom: 1,
            opacityTo: 1,
            // stops: [0, 50, 100],
            // colorStops: []
          }
        },
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
