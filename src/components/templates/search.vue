<template>
    <div>
        <h3 class="mb-12">Search Spotify</h3>
        <search />


        <div class="inline-flex mr-32 w-full items-start justify-center flex-wrap whitespace-normal">
            <div class="w-full lg:w-2/3">
                <search_results :results="results" />
            </div>

            <div class="w-full lg:w-1/3 mt-22">
                <top_tracks ref="top_tracks" class="bg-white border rounded border-indigo-25 p-3"/>
            </div>
        </div>
    </div>
</template>


<script>
import search from '@/components/section/search.vue'
import search_results from '@/components/section/search-results.vue'
import top_tracks from '@/components/section/top-tracks.vue'

export default {
    name: 'template-search',

    components: {
        search,
        search_results,
        top_tracks
    },

    data() {
        return {
            results: [],
        }
    },
};
</script>

<style scoped>
</style>
