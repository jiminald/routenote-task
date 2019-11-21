<template>
<div class="inline-block w-full border rounded p-4 lg:p-6 text-base leading-none select-none transition" v-bind:class="container_class">
    <div class="flex items-center w-full leading-none mb-4" v-bind:class="text_class">
        <!-- Information SVG -->
        <svg version="1.1" viewBox="0 0 20.4 31.1" class="mr-4 text-inherit svg-icon" data-name="lightbulb-help-section" style="width: 24px; height: 24px;" v-if="type == 'information'">
            <g _fill="none" _stroke="#58bbc8" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
                <path pid="0" d="M8.7 21.9V11.4c0-.6 0-1.2-.2-1.8s-.8-1-1.4-.9-1 .8-.7 1.3c.2.3.7.4 1.1.4 1.5.1 2.1.1 3.6.1 0 0-.3 0 1.2-.1.4 0 .8-.1 1.1-.4.4-.5-.1-1.3-.7-1.3-.6-.1-1.2.4-1.4.9s-.2 1.2-.2 1.8v10.5M4.5 25.2c2.1.2 4.2.3 6.1.1 1.7-.2 3.5-.3 5.1.1M6.1 28c.6 0 1.2-.1 1.8-.1l6.3.3M8.4 30.6c1.1-.4 2.3-.4 3.4 0"></path>
                <path pid="1" d="M6.8 22.4c.2-1.2-.5-2.9-1.3-4.2-.8-1.2-1.9-2.2-2.8-3.3-1.5-2.1-2.2-4.8-1.4-7.2 0 0 2-6.8 8.9-6.7h.1c7-.2 8.6 6.7 8.6 6.7.8 2.4.1 5.1-1.4 7.2-.9 1.2-2 2.2-2.8 3.4-.8 1.2-1 2.6-1 4.2" stroke-width="2"></path>
            </g>
        </svg>

        <!-- Error SVG -->
        <svg version="1.1" viewBox="0 0 30.4 28.7" class="mr-4 text-inherit svg-icon" data-name="error" style="width: 24px; height: 24px;" v-if="type == 'error'">
            <path pid="0" d="M18.3 1h-6.2C9.2 1 6.6 2.5 5.2 5l-3.1 5.4c-1.4 2.5-1.4 5.5 0 8l3.1 5.4c1.4 2.5 4.1 4 6.9 4h6.2c2.9 0 5.5-1.5 6.9-4l3.1-5.4c1.4-2.5 1.4-5.5 0-8L25.2 5c-1.4-2.5-4.1-4-6.9-4z" _fill="none" _stroke="#e35953" stroke-width="2"
                stroke-miterlimit="10"></path>
            <text transform="translate(12.226 20.192)" font-size="18" font-family="HKGrotesk-Bold" _fill="#e35953">!</text>
        </svg>

        <!-- Fatal SVG -->
        <svg version="1.1" viewBox="0 0 30.4 28.7" class="mr-4 text-inherit svg-icon" data-name="error" style="width: 24px; height: 24px;" v-if="type == 'fatal'">
            <path pid="0" d="M18.3 1h-6.2C9.2 1 6.6 2.5 5.2 5l-3.1 5.4c-1.4 2.5-1.4 5.5 0 8l3.1 5.4c1.4 2.5 4.1 4 6.9 4h6.2c2.9 0 5.5-1.5 6.9-4l3.1-5.4c1.4-2.5 1.4-5.5 0-8L25.2 5c-1.4-2.5-4.1-4-6.9-4z" _fill="none" _stroke="#e35953" stroke-width="2"
                stroke-miterlimit="10"></path>
            <text transform="translate(12.226 20.192)" font-size="18" font-family="HKGrotesk-Bold" _fill="#e35953">!</text>
        </svg>

        <h5 class="!text-inherit">{{ title }}</h5>
    </div>
    <div class="block w-full leading-normal text-sm lg:text-base text-left" v-if="message != ''">
        {{ message }}
    </div>
</div>
</template>


<script>
export default {
    name: 'notification',

    props: {
        type: String,
        title: String,
        message: String,
    },

    computed: {
        container_class: function() {
            return {
                'border-error bg-error text-white' : this.is_type('fatal'),
                'border-error bg-error-5 text-black' : this.is_type('error'),
                'border-information bg-information-10 text-black' : this.is_type('information'),
            } // End of return "Determine the class set by the notification type"
        }, // End of function "container_class"
        text_class: function() {
            return {
                'text-white' : this.is_type('fatal'),
                'text-error' : this.is_type('error'),
                'text-information' : this.is_type('information'),
            } // End of return "Determine the class set by the notification type"
        } // End of function "text_class"
    },

    methods: {
        is_type: function(type) {
            if ((type == 'fatal') && (this.type == 'fatal')) {
                return true; // End of if "Is this type equal to "
            } // End of if "Is this type equal to fatal"
            if ((type == 'error') && (this.type == 'error')) {
                return true;
            } // End of if "Is this type equal to error"
            if ((type == 'information') && (this.type == 'information')) {
                return true;
            } // End of if "Is this type equal to information"

            // Dont style if we dont know
            return false;
        } // End of function "is_type"
    }

};
</script>

<style scoped>
</style>
