<template>
    <svg version="1.1" viewBox="0 0 38 38" :id="id" class="text-indigo svg-icon" data-name="spinner" style="width: 48px; height: 48px; display: none;">
        <g transform="translate(1 1)" stroke-width="2" _fill="none" fill-rule="evenodd">
            <circle pid="0" stroke-opacity=".5" cx="18" cy="18" r="18"></circle>
            <path pid="1" d="M36 18c0-9.94-8.06-18-18-18" transform="rotate(335.339 18 18)">
                <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"></animateTransform>
            </path>
        </g>
    </svg>
</template>


<script>
export default {
    name: 'spinner',

    props: {
        id: '',
    }
};
</script>

<style scoped>
</style>
