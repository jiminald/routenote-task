<template>
<div id="app">
    <div class="overflow-visible sidebar-open">
        <layout_header />

        <layout_sidebar />

        <main class="mt-16 lg:mt-20 overflow-y-visible overflow-x-hidden lg:overflow-x-visible ml-menu p-6">

            <template_search />

        </main>
    </div>
</div>
</template>

<script>
// Layout
import layout_header from '@/components/layout/header.vue'
import layout_sidebar from '@/components/layout/sidebar.vue'

// Templates
import template_search from '@/components/templates/search.vue'

export default {
    name: 'app',
    components: {
        layout_header,
        layout_sidebar,

        // Templates
        template_search,
    },

}
</script>

<style>

</style>
