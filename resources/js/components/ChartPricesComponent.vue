  <template>
    <Line :data="chartData" :options="chartOptions" />
  </template>
  
  <script>
  import { Line } from 'vue-chartjs'
  import { Chart as ChartJS, Title, Tooltip, Legend, LineElement, PointElement, CategoryScale, LinearScale } from 'chart.js'
  
  ChartJS.register(Title, Tooltip, Legend, PointElement, LineElement, CategoryScale, LinearScale)
  
  export default {
    name: 'App',
    components: { Line },
    props: {
        months: Array,
        tourPrices: Array,
        bikePrices: Array,
        breakfastPrices: Array,
    },
    data() {
      return {
        chartData: {
          labels: this.months,
          datasets: [
            {
              label: 'Tour V. total prices',
              backgroundColor: '#16425F',
              data: this.tourPrices
            },
            {
              label: 'Bikes V. total prices',
              backgroundColor: '#198754',
              data: this.bikePrices
            },
            {
              label: 'Breakfast V. total prices',
              backgroundColor: '#F4B942',
              data: this.breakfastPrices
            },
          ]
        },
        chartOptions: {
          responsive: true,
        }
      }
    }
  }
  </script>
  