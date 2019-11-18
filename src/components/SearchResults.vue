<template>
<div class="pt-4 mt-4" id="results-table">
    <table class="w-full">
        <thead>
            <tr>
                <th class="text-left text-indigo">Image</th>
                <th class="text-left text-indigo">Artist</th>
                <th class="text-left text-indigo">asd</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border rounded border-indigo-25" v-for="result in results" :key="result.id">
                <td>
                    <div class="w-24 h-24 bg-indigo-5 inline-flex items-center justify-center mr-4 rounded">
                        <svg version="1.1" viewBox="0 0 84.7 67.1" class="svg-icon svg-original" data-name="missing-image" style="width: 50%; height: 50%;">
                            <g fill="#c9cce0">
                                <path pid="0" d="M59.2 12.3c-4.1 1-6.6 5.1-5.7 9.2 1 4.1 5.1 6.6 9.2 5.7s6.6-5.1 5.7-9.2-5.1-6.7-9.2-5.7zm3.1 12.9c-3 .7-6.1-1.2-6.8-4.2s1.2-6.1 4.2-6.8c3-.7 6.1 1.2 6.8 4.2s-1.2 6.1-4.2 6.8zM27.9 22.8c-1.6-2.4-4.6-3.6-7.5-2.9-3.3.8-5.5 3.8-5.4 7.1-1.6.8-2.5 2.6-2.1 4.4.1.6.5 1.2.9 1.7.2.3.6.4 1 .3l17.4-4.1c.4-.1.7-.4.8-.8.1-.6.1-1.2-.1-1.8-.6-2.5-2.7-4.1-5-3.9zm3.1 4.5l-16 3.8c-.1-.1-.1-.2-.1-.3-.2-1 .4-2 1.4-2.2.5-.1.8-.6.8-1.1-.4-2.6 1.3-5.1 3.8-5.7 2.2-.5 4.6.5 5.6 2.6.2.4.7.6 1.1.5 1.5-.3 3 .6 3.3 2.1 0 .1 0 .2.1.3z"></path>
                                <path pid="1" d="M67.7 4.8L7 19.2c-1.6.4-2.6 2-2.2 3.6l8.9 37.5c.1.6.4 1 .8 1.4-.1.3 0 .6.2.8.2.3.6.5 1 .4l1.2-.3c.1 0 .3 0 .4-.1L78 48.1c1.6-.4 2.6-2 2.2-3.6L71.3 7c-.4-1.6-2-2.6-3.6-2.2zm-9.5 45.9c-1.2-.9-2.4-1.7-3.5-2.4 3.7-6 3.7-6.1 3.8-6.2.4-.8 1.8-1.1 2.5-.6.1 0 .3.2 10 6.2l-12.8 3zm-2.6.6l-3.2.8c.5-.8.9-1.5 1.3-2.1.6.4 1.3.9 1.9 1.3zm-6 1.5l-32.2 7.7c4.5-8.5 11.6-21.6 11.8-22 .6-.9 1.6-1.5 2.7-1.8 1.2-.3 2.3-.1 3.2.4.5.3 9.4 6.6 16.8 11.7-.8 1.5-1.7 2.9-2.3 4zM78.2 45c.1.5-.2 1.1-.7 1.2l-3.8.9c-4.5-2.8-11.1-6.9-11.6-7.2-.8-.6-1.9-.8-3-.6-1.1.3-2 1-2.4 1.8-.1.2-1.8 3-3.6 6-16.5-11.4-16.9-11.7-16.9-11.7-1.4-.8-3.1-1-4.8-.7-1.6.4-3.1 1.4-3.9 2.7 0 0-.1.2-12 22.2L6.7 22.4c-.1-.5.2-1.1.7-1.2L68.1 6.7c.5-.1 1.1.2 1.2.7L78.2 45z"></path>
                                <path pid="2" d="M68.7.1L3.8 15.6c-2.7.6-4.3 3.3-3.7 6L10 63.2c.6 2.7 3.3 4.3 6 3.7l64.8-15.4c2.7-.6 4.3-3.3 3.7-6L74.7 3.8c-.6-2.6-3.3-4.3-6-3.7zm14 45.9c.4 1.6-.6 3.2-2.2 3.6L15.6 65c-1.6.4-3.2-.6-3.6-2.2L2.1 21.1c-.4-1.6.6-3.2 2.2-3.6L69.2 2.1c1.6-.4 3.2.6 3.6 2.2L82.7 46z"></path>
                            </g>
                        </svg>
                    </div>
                </td>
                <td>
                    <div class="flex-1 self-start">
                        <h5 class="w-full">{{ result.name }}</h5>
                        <span class="opacity-50 text-indigo">Release Title (feat. Artist Name)</span>
                    </div>

                </td>
                <td>
                    <a :href="result.email" class="font-bold inline-flex items-center rounded-full text-left relative leading-none whitespace-no-wrap truncate select-none transition max-w-full overflow-hidden text-sm lg:text-base px-4 py-2 text-action hover:bg-action-20 active:bg-action-25">
                        <svg version="1.1" viewBox="0 0 10.7 10.7" data-name="tiny-link" class="mr-2 text-inherit flex-shrink-0 svg-icon" style="width: 18px; height: 18px;">
                            <g _fill="none" _stroke="#f19aae" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
                                <path pid="0" d="M5.4 8.9l-.6.7c-.8.8-2 .8-2.8 0l-.9-.9c-.8-.8-.8-2 0-2.8l1.8-1.8c.8-.8 2-.8 2.8 0l.9.9"></path>
                                <path pid="1" d="M5.2 1.7l.7-.7c.8-.8 2-.8 2.8 0l.9 1c.8.8.8 2 0 2.8L7.8 6.6c-.8.8-2.1.8-2.8 0l-.9-.9"></path>
                            </g>
                        </svg>
                        <span class="flex-1 overflow-hidden truncate leading-reset"> {{ result.email }} </span>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>
export default {
    name: 'results-table',
    props: {
        results: Array,
    }
}
</script>

<style scoped>
thead th {
    padding-bottom: 2rem;
}

td {
    padding-top: 20px;
    padding-bottom: 20px;
    padding-right: 20px;
}

td:first-child {
    padding-left: 20px;
    padding-right: 0;
}

.grid {
    display: grid;
    min-width: 0;
    min-height: 0;
}
</style>
