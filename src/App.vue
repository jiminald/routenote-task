<template>
  <div id="app" class="small-container">
    <h1>Search Spotify</h1>

    <search />

    <results-table :results="results" />
  </div>
</template>

<script>
import Search from '@/components/Search.vue'
import ResultsTable from '@/components/SearchResults.vue'

export default {
  name: 'app',
  components: {
    Search,
    ResultsTable
},

  data() {
    return {
      results: [
        {
          id: 1,
          name: 'Richard Hendricks',
          email: 'richard@piedpiper.com',
        },
        {
          id: 2,
          name: 'Bertram Gilfoyle',
          email: 'gilfoyle@piedpiper.com',
        },
        {
          id: 3,
          name: 'Dinesh Chugtai',
          email: 'dinesh@piedpiper.com',
        },
      ],
    }
  },

}
</script>

<style>

</style>
