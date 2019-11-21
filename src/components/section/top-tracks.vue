<template>
    <div class="items-center mx-4">

        <h4>Top Tracks for <span ref="artist_name">#name</span></h4>

        <spinner id="top_tracks_spinner" />

        <div class="block my-4 py-3" v-for="result in results" :key="result.id">
            <h5 class="block">{{ result.name }}</h5>
            <small>Duration: {{ result.duration_ms | ms_to_time }}</small>

            <div>Rating: * * * - -</div>

            <div class="stars-outer" :id="result.id" v-rating="{ id: result.id, rating: result.popularity }">
                <div class="stars-inner"></div>
            </div>

            <div>
                <a :href="result.external_urls.spotify" target="_blank" class="group btn relative transition btn-small btn-secondary" v-if="result.is_playable == true">
                    <span class="whitespace-no-wrap">Play on Spotify</span>
                </a>
            </div>
        </div>

    </div>
</template>


<script>

// Components
import spinner from '@/components/elements/spinner.vue'

// Libraries
import axios from "axios";

export default {
    name: 'section-top_tracks',

    components: {
        spinner
    },

    data() {
        return {
            processing: false,
            response: new Array,
            results: new Array,
        }
    }, // End of vue.js declaration "data"

    mounted(){
        this.reset();
    }, // End of vue.js declaration "mounted"

    filters: {
        // From: https://stackoverflow.com/a/9763769
        ms_to_time: function(s) {
            var pad = (n, z = 2) => ('00' + n).slice(-z);
            return pad(s/3.6e6|0) + ':' + pad((s%3.6e6)/6e4 | 0) + ':' + pad((s%6e4)/1000|0);
        } // End of function "ms_to_time"
    }, // End of vue.js declaration "filters"

    directives:{
        rating: {
            // Source: https://webdesign.tutsplus.com/tutorials/a-simple-javascript-technique-for-filling-star-ratings--cms-29450
            inserted(el, binding, vnode) {
                var id = binding.value.id;
                var rating = binding.value.rating;

                // Math the percentage
                const starTotal = 100;
                const starPercentage = (rating / starTotal) * 100;
                const starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;

                // Update star rating
                var star_outer = document.getElementById(id);
                var star_inner = star_outer.getElementsByClassName('stars-inner')[0];
                star_inner.style.width = starPercentageRounded;
            } // End of function "inserted"
        } // End of directive "rating"
    }, // End of vue.js declaration "directives"

    methods: {
        reset: function() {
            // Hide ourself
            this.$el.style.display = 'none';
        },
        pre_execution() {
            // Report that we're in a processing session
            this.processing = true;

            // Hide ourself
            this.$el.style.display = '';

            // Show loading icon
            document.getElementById('top_tracks_spinner').style.display = '';
        }, // End of function "pre_execution"

        post_execution() {
            // Always hide loading icon
            document.getElementById('top_tracks_spinner').style.display = 'none';

            // Now we can report that we've finished processing
            this.processing = false;
        }, // End of function "post_execution"

        fetch_tracks(artist_name, artist_id) {
            var _self = this;

            // Check for processing flag
            if (this.processing === true) {
                return;
            } // End of if "We cant process two at the same time"

            // Set artist name
            this.$refs.artist_name.innerHTML = artist_name;

            // Run pre-execution tasks
            this.pre_execution();

            axios.get('/api/spotify/artist/' + artist_id + '/top_tracks')
                .then(response => {
                    // this.process_results(response);
                    this.results = response.data.tracks;
                }).catch(err => {
                    // eslint-disable-next-line no-console
                    console.error(err);

                    // this.error_encountered(error);

                }).finally(function() {
                    // Still run post-execution
                    _self.post_execution();
                });
        },
    } // End of vue.js declaration "methods"
};
</script>

<style scoped>

.stars-outer {
  display: inline-block;
  position: relative;
  font-family: FontAwesome;
}

.stars-outer::before {
  content: "\f006 \f006 \f006 \f006 \f006";
}

.stars-inner {
  position: absolute;
  top: 0;
  left: 0;
  white-space: nowrap;
  overflow: hidden;
  width: 0;
}

.stars-inner::before {
  content: "\f005 \f005 \f005 \f005 \f005";
  color: #f8ce0b;
}

</style>
