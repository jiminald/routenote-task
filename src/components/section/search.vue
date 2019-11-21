<template>
<div class="flex-1 xxl:flex-none text-right">
    <button ref="button" class="inline-flex items-center justify-center text-action font-bold text-sm lg:text-base leading-none hover:bg-action-20 active:bg-action-25 py-3 lg:py-4 pl-3 lg:pl-4 pr-4 lg:pr-6 rounded-full transition select-none"
        v-on:click="toggle_search">
        <svg version="1.1" viewBox="0 0 23.7 24.9" class="text-inherit mr-4 svg-icon" data-name="magnifying-glass" style="width: 24px; height: 24px;">
            <g _fill="none" _stroke="#f19aae" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
                <circle pid="0" cx="9.5" cy="9.5" r="8.5"></circle>
                <path pid="1" d="M14.9 16.1l7.8 7.8"></path>
            </g>
        </svg>
        <span>Search</span>
    </button>

    <div ref="input" class="relative inline-block flex items-center search" style="width: 100%; margin-top: 4px; display: none;">

        <input placeholder="Search for something and press enter" type="text" class="input flex-1 transition px-3 lg:px-4 with-icon !pr-12" style="width: 100%;" v-model="search.query" v-on:keydown="search_keydown" v-on:focusout="toggle_search">

        <div class="input-icon left">
            <svg version="1.1" viewBox="0 0 23.7 24.9" class="select-none float-left ml-1 mt-1 lg:mt-0 svg-icon text-indigo-25" data-name="magnifying-glass" style="width: 24px; height: 24px;">
                <g _fill="none" _stroke="#f19aae" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
                    <circle pid="0" cx="9.5" cy="9.5" r="8.5"></circle>
                    <path pid="1" d="M14.9 16.1l7.8 7.8"></path>
                </g>
            </svg>
        </div>

        <div class="input-icon right m-px rounded">
            <svg version="1.1" viewBox="0 0 13.1 13" class="cursor-pointer select-none text-indigo-50 mr-1 mt-1 float-right svg-icon" data-name="medium-modal-cross" style="width: 16px; height: 16px; display: none;" v-on:click="search_clear">
                <g _fill="none" _stroke="#293584" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
                    <path pid="0" d="M.1.1l12.8 12.8M12.9.1L.1 12.9"></path>
                </g>
            </svg>
        </div>

    </div>
</div>
</template>


<script>
import axios from "axios";

export default {
    name: 'section-search',
    data() {
        return {
            search: {
                query: '',
            },
            timer: '',

            results: null,
        }
    },
    methods: {
        toggle_search() {
            var button_container = this.$refs.button;
            var input_container = this.$refs.input;

            // Toggle states
            if ((button_container.style.display == 'none') && (input_container.getElementsByTagName('input')[0].value == '')) {
                button_container.style.display = '';
                input_container.style.display = 'none';
            } else {
                button_container.style.display = 'none';
                input_container.style.display = '';
                input_container.getElementsByTagName('input')[0].focus();
            }
        },

        search_keydown() {
            var input_container = this.$refs.input;
            var icon_right = input_container.getElementsByClassName('input-icon right')[0];
            var icon_right_svg = icon_right.getElementsByTagName('svg')[0];
            if (input_container.getElementsByTagName('input')[0].value !== '') {
                icon_right_svg.style.display = '';

                // Stop timer and reset
                clearTimeout(this.timer);
                this.timer = setTimeout(this.perform_search, 500);
            } else {
                icon_right_svg.style.display = 'none';
            }
        },

        search_clear() {
            var input_container = this.$refs.input;
            var input_field = input_container.getElementsByTagName('input')[0];

            input_field.value = '';
            input_field.focus();
        },

        perform_search() {
            var input_container = this.$refs.input;
            var input_field = input_container.getElementsByTagName('input')[0];

            var results_component = this.$parent.$children.find(child => { return child.$options.name === "section-search_results"; });
            results_component.reset();
            results_component.pre_execution();

            if (input_field.value.length > 0) {
                var data = { q: input_field.value };
                axios.post('/api/spotify/search/artist', data)
                    .then(response => {
                        // Find the results element and update it
                        results_component.process_results(response);
                    }).catch(err => {
                        // eslint-disable-next-line no-console
                        // console.error(err);
                        results_component.error_encountered('We\'ve encountered an error contacting the server.');
                        results_component.post_execution();
                    });
            } // End of if "Do we have anything to search on"

        },
    },
}

</script>

<style scoped>
/* Generic input field */
.input {
    border-radius: .25rem;
    font-size: 1rem;
    text-align: left;
    border-color: #949ac1;
    border-width: 1px;
    background-color: #ffffff;
    height: 2.5rem;
    box-shadow: none;
    line-height: 2.5rem;
    appearance: none;
    -moz-appearance: none;
    -webkit-appearance: none;
}

@media (min-width: 992px) {
    .input {
        font-size: 1.125rem;
        height: 3rem;
        line-height: 3rem;
    }
}

.input.with-icon {
    text-indent: 39px;
}

/* Search specific input styling */
.search .input {
    border-color: #c9cce0;
}

.search .input:focus {
    border-color: #293583;
}

/* Input with icon - left side */
.input-icon.left {
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    padding-left: 0.75rem;
    padding-right: 0.75rem;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}

@media (min-width: 992px) {
    .input-icon.left {
        padding: 0.75rem;
    }
}

/* Input with icon - right side */
.input-icon.right {
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    padding-left: 0.75rem;
    padding-right: 0.75rem;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}

@media (min-width: 992px) {
    .input-icon.right {
        padding: 0.75rem;
    }
}
</style>
