  <template>
    <Bar :data="chartData" :options="chartOptions" />
  </template>
  
  <script>
  import { Bar } from 'vue-chartjs'
  import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
  
  ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)
  
  export default {
    name: 'Count Chart',
    components: { Bar },
    props: {
        months: Array,
        tourCounts: Array,
        bikeCounts: Array,
        breakfastCounts: Array,
    },
    data() {
      return {
        chartData: {
          labels: this.months,
          datasets: [
            {
              label: 'Tour Vouchers Count',
              backgroundColor: '#16425F',
              data: this.tourCounts
            },
            {
              label: 'Bike Vouchers Count',
              backgroundColor: '#198754',
              data: this.bikeCounts
            },
            {
              label: 'Breakfast Vouchers Count',
              backgroundColor: '#F4B942',
              data: this.breakfastCounts
            }
          ]
        },
        chartOptions: {
          responsive: true,
        }
      }
    }
  }
  </script>
  