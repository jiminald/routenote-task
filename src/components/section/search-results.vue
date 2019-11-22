<template>
<div class="pt-4 mt-4" id="results-table">
    <table class="w-full">
        <thead>
            <tr>
                <th class="text-left text-indigo">Image</th>
                <th class="text-left text-indigo">Artist</th>
                <th class="text-left text-indigo">Followers</th>
                <th class="text-left text-indigo">&nbsp;</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            <tr class="border rounded border-indigo-25" v-for="result in results" :key="result.id" :data-artist_id="result.id" :data-artist_name="result.name">
                <td>
                    <div class="w-24 h-24 bg-indigo-5 inline-flex items-center justify-center mr-4 rounded">
                        <img :src="result.images[2].url" :width="result.images[2].width" :height="result.images[2].height" v-if="typeof result.images !== 'undefined' && '2' in result.images">
                        <svg version="1.1" viewBox="0 0 84.7 67.1" class="svg-icon svg-original" data-name="missing-image" style="width: 50%; height: 50%;" v-else>
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
                        <span class="opacity-50 text-indigo" v-if="result.genres.length > 0">Genres: </span>
                        <span class="opacity-50 text-indigo mr-1" v-for="genre in result.genres">{{ genre }}</span>
                    </div>

                </td>

                <td>
                    {{ result.followers.total | format_number }}
                </td>

                <td>
                    <a v-on:click="get_top_tracks" class="group btn relative transition btn-small btn-primary mb-2">
                        <span class="whitespace-no-wrap">Show top Tracks</span>
                    </a>

                    <a :href="result.external_urls.spotify" target="_blank" class="group btn relative transition btn-small btn-secondary">
                        <span class="flex-1 overflow-hidden truncate leading-reset"> View on Spotify </span>
                    </a>
                </td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td colspan="4" class="text-center">

                    <svg version="1.1" viewBox="0 0 38 38" id="spinner" class="text-indigo svg-icon" data-name="spinner" style="width: 48px; height: 48px; display: none;">
                        <g transform="translate(1 1)" stroke-width="2" _fill="none" fill-rule="evenodd">
                            <circle pid="0" stroke-opacity=".5" cx="18" cy="18" r="18"></circle>
                            <path pid="1" d="M36 18c0-9.94-8.06-18-18-18" transform="rotate(335.339 18 18)">
                                <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"></animateTransform>
                            </path>
                        </g>
                    </svg>

                    <div id="no-results" class="notification-container">
                        <div class="flex w-full py-16 items-center justify-center text-center">
                            <div>
                                <svg version="1.1" viewBox="0 0 89.7 170.7" class="svg-icon svg-original" data-name="ghost-plant" style="width: 160px; height: 160px;">
                                    <path pid="0" d="M89.3 112.7c-2.9-4-4-8.6-7.9-11.9-3.1-2.6-7.1-4.3-11.1-4.5-4.1-.2-8.1 1.2-11.3 3.6-3.5 2.5-4.8 5.6-7 9.1-.8 1.3-.5 2.5.2 3.3.1.1.1.2.2.3 1.3 1.5 2.7 2.9 4.3 4.2 11.2.3 20.2.5 20.3.5.8 0 1.5.7 1.5 1.5 0 .3 0 1.8-.3 3.6 3.7-1.2 7.1-3.4 10.1-5.6 1.1-.9 2-2.7 1-4.1z"
                                        fill="#e9eaf2"></path>
                                    <g fill="#e9eaf2">
                                        <path pid="1" d="M54 84.8c.5-4.7 1.8-9.4 3.7-13.7 1-2.4 2.4-4.7 4.7-5.8 1.5-.7 3.2-.7 4.8-.8 4.7 0 9.4-.1 14-.1.1 7.8-.3 16.6-5.6 22.1-2.8 2.9-6.8 4.5-10.7 4.3-3.8-.2-10.9-6-10.9-6z"></path>
                                        <path pid="2" d="M57 84.8c.7-5.2 2.2-15.8 8.5-17.2 4.8-1.1 10.8-.1 15.7-.2l-3-3c0 7.3.2 17.5-7 21.8-5.6 3.4-10.6 0-15.1-3.6-3-2.4-7.3 1.8-4.2 4.2 6.2 5 13 9.1 21 5.2 10.4-5 11.3-17.6 11.3-27.7 0-1.6-1.4-3-3-3-4.7 0-9.4-.1-14 .1-3 .1-5.8.4-8.2 2.4-5.5 4.7-7.1 14.1-8 20.8-.5 4.1 5.5 4 6 .2z"></path>
                                    </g>
                                    <g fill="#e9eaf2">
                                        <path pid="3" d="M52.6 57c.1-4.8 2.4-9.3 5.4-12.9 2.5-3 5.5-5.5 9.1-6.5 4.2-1.1 8.6 0 12.7 1.4-2 6-4.2 12.3-8.7 16.4-5.2 4.5-18.5 1.6-18.5 1.6z"></path>
                                        <path pid="4" d="M55.6 57c.3-5.1 3-9.7 6.8-13.2 5-4.6 10.6-3.9 16.7-1.9-.7-1.2-1.4-2.5-2.1-3.7-2.2 6.5-4.7 15.6-12.6 16.6-3.6.5-7.5.1-11-.7-3.8-.8-5.4 5-1.6 5.8 5.3 1.1 11.4 1.7 16.6.2 8.5-2.5 11.8-12.7 14.3-20.3.5-1.6-.6-3.2-2.1-3.7-7.6-2.5-14.9-2.9-21.3 2.4-5.6 4.6-9.3 11.2-9.8 18.5-.1 3.8 5.9 3.8 6.1 0z"></path>
                                    </g>
                                    <g fill="#e9eaf2">
                                        <path pid="5" d="M36.8 39.7c.1-2.2-.1-4.5-1.2-6.4-1-1.8-2.7-3.1-4.5-3.9s-3.7-1.2-5.6-1.7c.9 1.9 1.2 4 2 5.9 1.6 3.8 5.3 6.4 9.2 6.4l.1-.3z"></path>
                                        <path pid="6" d="M39.8 39.7c.1-3.8-.7-7.5-3.4-10.3-2.7-2.7-6.4-3.7-10.1-4.5-2.8-.6-4.4 2-3.4 4.4 1.5 3.5 1.8 6.9 4.6 9.7 2.4 2.5 5.7 3.9 9.1 4.1 1.4.1 2.4-1 2.9-2.2.1-.1.1-.3.2-.4 1.4-3.6-4.4-5.2-5.8-1.6-.1.1-.1.3-.2.4 1-.7 1.9-1.5 2.9-2.2-6.1-.3-6.7-6.4-8.5-10.8-1.1 1.5-2.3 2.9-3.4 4.4 2.3.5 4.9.9 6.8 2.5 2 1.6 2.3 4.1 2.2 6.5 0 3.8 6 3.8 6.1 0z"></path>
                                    </g>
                                    <g fill="#e9eaf2">
                                        <path pid="7" d="M12.4 53.6c5.1-.7 10.3-.3 15.2 1 1.7.5 3.4 1 4.9 2.1 2.5 1.8 4.2 4.8 5 8 .8 3.1.9 6.4 1 9.7-2.2.1-4.5.3-6.7.4-1.6.1-3.2.2-4.8 0-4.3-.6-8-3.6-10.4-7.5-2.3-3.8-4.2-13.7-4.2-13.7z"></path>
                                        <path pid="8" d="M12.4 56.6c5.5-.6 12.5-.8 17.5 1.9 5.4 3 5.4 10.4 5.6 15.8l3-3c-8 .5-15.9 1.8-20-6.9-1.7-3.6-2.5-7.8-3.2-11.6-.7-3.8-6.5-2.2-5.8 1.6 1.1 5.4 2.3 11.5 5.6 16 6 8.2 14.2 7.6 23.4 6.9 1.6-.1 3-1.3 3-3-.2-7-.7-15.1-6.8-19.8-5.9-4.5-15.3-4.7-22.3-3.9-3.8.5-3.9 6.5 0 6z"></path>
                                    </g>
                                    <g fill="#e9eaf2">
                                        <path pid="9" d="M8.3 104.5c2.8 4.1 7.3 7 12 7.6 4.7.7 9.4-.7 14-2.1.5-.1 1-.3 1.3-.7.3-.4.3-.9.3-1.4.1-4.9.1-10.2-2.7-14.2-1.1-1.5-2.6-2.8-4.1-3.8-7.6-5.2-17.6-6.4-26.1-3.1 1 .8 2.5 13.5 5.3 17.7z"></path>
                                        <path pid="10" d="M5.7 106c4.8 6.5 11.7 10 19.9 9.1 3.3-.3 8.5-.9 11.2-3 2.8-2.1 2.2-6.4 2-9.5C37.7 84.9 17.2 78.7 2.3 84c-1.7.6-3 2.7-1.8 4.4 1.1 1.5 1.4 5.8 1.9 8 .7 3.3 1.5 6.7 3.3 9.6 2 3.3 7.2.3 5.2-3-1.9-3.1-2.5-7-3.3-10.5-.5-2.2-.6-5.3-2-7.2-.6 1.5-1.2 2.9-1.8 4.4 9.1-3.2 25.5-2 28.5 9.4.5 2 1 5.3.6 7.4.2.2.4.5.6.7-.6.2-1.1.3-1.7.5-1.3.6-2.9.8-4.3 1.1C21 110 15 108.5 11 103c-2.4-3.1-7.6-.1-5.3 3z"></path>
                                    </g>
                                    <g fill="#e9eaf2">
                                        <path pid="11" d="M53.6 32.3c1.9-7.1 9.2-12.1 16.1-10.9-.1 3.9-1.9 7.7-4.9 10-2.9 2.3-6.9 3.1-10.4 2"></path>
                                        <path pid="12" d="M56.5 33.1c1.6-5.2 6.7-9.6 12.4-8.8-.7-1-1.5-1.9-2.2-2.9-.3 6-5.3 10.7-11.4 9.1-3.7-1-5.3 4.8-1.6 5.8 10 2.6 18.5-5 19-14.9.1-1.2-1-2.7-2.2-2.9-9-1.2-17.1 4.3-19.7 13-1.2 3.7 4.6 5.3 5.7 1.6z"></path>
                                    </g>
                                    <path pid="13" d="M44 118.8c-.8 0-1.5-.7-1.5-1.5 0-13 .1-34.2.4-45.8l.1-4c.5-17.6.9-35.9-2.9-53.1-.2-.8.3-1.6 1.1-1.8.8-.2 1.6.3 1.8 1.1 3.9 17.6 3.4 36.1 3 53.9l-.1 4c-.3 11.5-.4 32.7-.4 45.7 0 .8-.6 1.4-1.5 1.5z"
                                        fill="#c9cee0"></path>
                                    <path pid="14" d="M44.6 56.1c-.6 0-1.1-.3-1.4-.9-2-5-4.5-9.8-7.2-14.4-1.7-2.9-3.7-5.8-6.5-7.2-.7-.4-1-1.3-.6-2s1.3-1 2-.6c3.4 1.8 5.7 5.1 7.6 8.4C41.4 44 43.9 49 46 54.1c.3.8 0 1.6-.8 2h-.6zM43.9 81.7c-.7 0-1.3-.5-1.5-1.2-2.2-9.3-10.6-16.4-19.6-16.5h-.3c-.5.5-1.4.6-2 .1-.7-.5-.8-1.5-.3-2.1.8-1 2-1 2.5-1 10.3.1 20 8.2 22.6 18.8.2.8-.3 1.6-1.1 1.8 0 .1-.1.1-.3.1z"
                                        fill="#c9cee0"></path>
                                    <path pid="15" d="M44.3 74.3c-.2 0-.3 0-.5-.1-.8-.3-1.2-1.1-.9-1.9 4.5-12.4 13-22.9 23.9-29.5.7-.4 1.6-.2 2.1.5.4.7.2 1.6-.5 2.1C58 51.6 50 61.6 45.7 73.4c-.2.6-.8.9-1.4.9zM43.7 116.7c-.6 0-1.2-.4-1.4-1-1.5-4-5.3-6.5-9.1-8.7-5-2.9-10.2-5.7-15.4-8.3-.7-.4-1-1.3-.7-2 .4-.7 1.3-1 2-.7 5.2 2.6 10.5 5.4 15.5 8.4 4.1 2.4 8.6 5.3 10.4 10.3.3.8-.1 1.6-.9 1.9-.1 0-.3.1-.4.1z"
                                        fill="#c9cee0"></path>
                                    <path pid="16" d="M43.9 115.6c-.6 0-1.1-.3-1.4-.8-.4-.7 0-1.6.7-2 4.3-2.1 8.8-4.3 13.6-5.5 5.5-1.4 10.7-1.1 15 .6.8.3 1.1 1.2.8 2-.3.8-1.2 1.1-2 .8-3.7-1.5-8.2-1.7-13.1-.5-4.5 1.1-8.8 3.2-13 5.2-.2.2-.4.2-.6.2zM45 97.5c-.3 0-.7-.1-1-.3-.6-.5-.7-1.5-.2-2.1l9.9-11.9c4.4-5.2 8.8-10 14.9-11.1.8-.1 1.6.4 1.7 1.2.1.8-.4 1.6-1.2 1.7-5.1.9-9.1 5.3-13.1 10.1L46.1 97c-.3.3-.7.5-1.1.5zM44.7 44.2c-.2 0-.5-.1-.7-.2-.7-.4-1-1.3-.6-2 4.1-7.9 11.5-13.9 19.7-16 .8-.2 1.6.3 1.8 1.1.2.8-.3 1.6-1.1 1.8-7.4 1.9-14.1 7.3-17.8 14.4-.2.6-.8.9-1.3.9z"
                                        fill="#c9cee0"></path>
                                    <path pid="17" d="M25.3 162.5c3.2-17.6 13.8-29 27.5-35.1L16 128s-1.5 29.4 9.3 34.5z" opacity=".05" fill="#293583"></path>
                                    <path pid="18" d="M73.6 128.2c-.5 0-45.9-.4-58-.8-.2 0-6.2-.2-6.6-9.9 0-.4.1-.8.4-1.1.6-.7.9-.9 34.8-.1 16.4.4 33 .8 33.2.8.8 0 1.5.7 1.5 1.5 0 .6 0 6-2.4 8.4-.9.8-1.8 1.2-2.9 1.2zm0-3c.2 0 .4 0 .7-.3.9-.9 1.3-3 1.5-4.8-23.3-.6-56.6-1.4-63.6-1.3.7 5.3 3.5 5.6 3.6 5.6 12 .4 57.1.8 57.8.8z"
                                        fill="#c9cee0"></path>
                                    <path pid="19" d="M40.7 170.7c-2.4 0-4.9-.3-7.3-1-7.1-2-13.1-7.5-16-14.7-1.6-3.9-2.5-12.8-2.8-16.5-1-12.2-.2-12.9.3-13.3.5-.4 1.3-.5 1.8-.1-.3-.2-.5-.2-.6-.2 1.6.1 41.6.5 56.9.7.8 0 1.4.6 1.5 1.4.4 6.2.7 13.2-.2 18.6-1.1 6.5-3.9 11.9-8.2 15.7-2.6 2.3-5.9 4.3-10.2 6.1-4.2 1.7-9.6 3.3-15.2 3.3zM17 128c-.2 4.5 1 21 3.1 26 2.6 6.3 7.9 11.2 14.1 12.9 7.3 2.1 15.1 0 20.4-2.2 4-1.6 7.1-3.4 9.4-5.5 4.7-4.3 6.5-10 7.2-14 .8-4.7.6-10.9.3-16.5-38.7-.4-50.6-.6-54.5-.7z"
                                        fill="#c9cee0"></path>
                                    <g fill="#e9eaf2">
                                        <path pid="20" d="M42.9 10.3c.4-2.8 1.2-5.6 2.5-8 .3-.6.8-1.3 1.4-1.3.8.1 1.1 1.4 1 2.4 0 2.2 0 4.4-.1 6.7.5-3 4.5-7 5.7-5.1s-2.2 4.3-3.4 6.5c-.2.3-.3.7-.2 1 .2.4.7.4 1.1.3 1.4-.4 2.7-1 4.1-.9 1.4.2 2.8 1.7 2.3 3.3-.4 1.4-1.9 1.8-3.1 1.8-1.2 0-2.6-.2-3.6.8 1.5 0 3 .4 4.4 1.1.8.4 1.6 1 1.8 2 .4 1.9-1.8 3.4-3.4 2.9-1.6-.5-3-2-4.5-2.7.4 2.4.7 4.8.6 7.2 0 .6-.1 1.2-.5 1.5-.3.2-.7 0-1-.1-2.4-1.4-3.7-4.8-3-7.8-1 2.5-1.9 4.9-2.9 7.4-.1.3-.3.7-.5.9-.5.5-1.4.1-1.7-.6-.4-.7-.4-1.5-.3-2.3.1-2.3 1-6.6 1.1-6.7.1-.1-2.6 2.6-4.3 3.1-1.2.3-2.7.2-3.1-1.2-.4-1.4.8-2.8 2-3.3s2.6-.6 3.5-1.7c-2.3.5-4.7-.4-6.4-2.2-.6-.6-1-1.7-.4-2.3.2-.2.5-.3.8-.3 1.9-.2 3.9.4 5.6 1.6-1.2-.6-2.4-1.3-3.3-2.4s-1.3-2.3-.6-4.3c.7-2 3.9 2.7 5.2 4.9-1.6-1.9-3.2-6.5-1.7-7.4s4.2 3 4.7 5.7"></path>
                                        <path pid="21" d="M41 31.5h-.4c-.7-.1-1.3-.6-1.7-1.3-.5-.9-.5-1.9-.4-2.8 0-.4.2-2.3.5-4-.9.7-1.9 1.2-2.4 1.4-1.7.5-3.8 0-4.4-1.8-.6-1.9.8-3.8 2.5-4.5.1 0 .1 0 .2-.1-1.3-.4-2.4-1.2-3.4-2.3-.9-1-1.4-2.7-.4-3.7.5-.5 1.2-.6 1.5-.6h1.1c-.6-1.1-1-2.5-.3-4.5.3-.9 1-1.1 1.3-1.1.3-.2.8-.2 1.5.3v-.8c.2-1 .6-1.4 1-1.7.6-.4 1.3-.4 2-.1 1.2.5 2.4 1.9 3.2 3.5.5-2 1.2-3.9 2.1-5.7C45.2.5 46-.1 47 0c1.2.2 1.9 1.4 1.9 3.4v2.4c1-1.2 2.2-2.1 3.3-2.3.9-.2 1.8.2 2.2.9 1.2 1.9-.5 3.9-1.8 5.5-.5.6-1.1 1.2-1.4 1.8.2-.1.4-.1.7-.2 1-.3 2.2-.7 3.4-.6 1 .1 2.1.8 2.7 1.8.6.9.7 1.9.5 2.8-.4 1.3-1.5 2.2-3.1 2.4.1 0 .1.1.2.1 1.3.7 2 1.6 2.3 2.7.3 1.1-.1 2.3-1 3.1-1 .9-2.4 1.3-3.7 1-1.1-.3-2-1-2.8-1.6 0 0-.1 0-.1-.1.2 1.7.3 3.5.3 5.3 0 .5 0 1.8-1 2.3-.6.3-1.3.3-2-.1-1.5-.9-2.6-2.4-3.2-4.2L43 29.7c-.2.4-.4.9-.8 1.3-.4.3-.8.5-1.2.5zm.5-10.5c-.1.5-.9 4.3-1 6.4 0 .7 0 1.4.2 1.8l.2.2c.1-.1.2-.3.2-.5l2.9-7.4c.2-.5.7-.7 1.2-.6.5.2.8.7.7 1.2-.6 2.6.5 5.6 2.5 6.7v-.5c0-2.4-.2-4.7-.6-7-.1-.4.1-.7.4-1s.7-.3 1-.1c.8.3 1.5.8 2.2 1.3.8.5 1.5 1.1 2.2 1.3.5.2 1.3-.1 1.8-.5.3-.2.5-.7.4-1.2-.1-.5-.5-.9-1.3-1.3-1.2-.7-2.6-1-3.9-1-.4 0-.8-.2-.9-.6-.2-.4-.1-.8.2-1.1 1.1-1.2 2.7-1.1 3.9-1.1h.4c.4 0 1.9 0 2.2-1.1.1-.5 0-.9-.2-1.2-.2-.3-.7-.7-1.2-.7-.8-.1-1.6.2-2.5.5-.4.1-.8.3-1.2.4-1 .3-1.9-.1-2.2-.9-.3-.8.1-1.5.2-1.9.4-.8 1.1-1.6 1.8-2.4 1.2-1.4 2-2.5 1.6-3.1-.1-.1-.3 0-.8.2-1.2.8-2.8 2.8-3.1 4.5-.1.5-.6.9-1.1.8-.5 0-.9-.5-.9-1l.1-6.7c0-.7-.1-1.1-.2-1.3-.1.1-.2.3-.4.6-1.2 2.4-2 5-2.4 7.7 0 .4-.3.6-.6.8-.1.2-.4.3-.6.4-.5.1-1.1-.2-1.2-.8-.5-2.4-2.6-5-3.3-5-.4.4.1 2.5 1 4.3.3.5.7 1.1 1.1 1.7.3.4.2 1-.3 1.3-.4.3-1 .2-1.4-.2-.4-.5-.8-1.1-1.2-1.8-1.1-1.6-1.9-2.6-2.4-3-.4 1.3-.1 2 .6 3 .4.5.8.9 1.4 1.3.6.3 1.2.6 1.7.9.4.3.6.9.3 1.3-.3.5-.8.6-1.3.4-.6-.3-1.1-.6-1.6-.9-1.1-.5-2.3-.7-3.5-.6h-.2c0 .2.2.6.4.9 1.4 1.6 3.5 2.3 5.4 1.9.4-.1.8.1 1.1.5.2.4.2.8-.1 1.2-.8 1-1.9 1.3-2.9 1.6-.3.1-.6.2-1 .3-.8.3-1.6 1.2-1.4 2.1.3.8 1.5.6 1.9.5 1.1-.3 3.2-2.2 3.9-2.8.3-.3.8-.3 1.1-.2.4.2.6.6.6 1 .2.3.1.4.1.5z"></path>
                                    </g>
                                    <g fill="#c9cee0">
                                        <path pid="22" d="M47.7 16.2c0 1.5-1.2 2.8-2.6 2.8-3 0-2.6-1.2-2.6-2.8s1.2-2.5 2.6-2.8c2.6-.4 2.6 1.3 2.6 2.8z"></path>
                                        <path pid="23" d="M45.1 20.5c-1.1 0-2.5-.1-3.3-1-.8-.9-.8-2-.8-2.8v-.5c0-2.1 1.5-3.8 3.8-4.2 1.4-.2 2.4 0 3.2.6 1.2 1 1.2 2.5 1.2 3.6 0 2.4-1.8 4.3-4.1 4.3zM44 17.4c.2 0 .5.1 1.1.1.6 0 1.1-.6 1.1-1.3 0-.4 0-1.1-.1-1.4 0 0-.2 0-.7.1-.3.1-1.4.4-1.4 1.3v1.2z"></path>
                                    </g>
                                </svg>
                                <p class="block w-full text-indigo-50 text-center mt-2">
                                    No results to show
                                </p>
                            </div>
                        </div>

                    </div>

                    <div id="end-of-list" class="notification-container" style="display: none">
                        <notification type="information" title="End of List" />
                    </div>

                    <div id="error" ref="error_container" class="notification-container" style="display: none"></div>

                </td>
            </tr>
        </tfoot>
    </table>
</div>
</template>

<script>
// Components
import Vue from 'vue'
import notification from '@/components/elements/notification.vue'

// Libraries
import axios from "axios";
var numeral = require("numeral");

export default {
    name: 'section-search_results',

    components: {
        notification
    }, // End of vue.js declaration "components"

    data() {
        return {
            processing: false,
            response: new Array,
            results: new Array,

            vue_instance: null,
            error_notification: null,
        }
    }, // End of vue.js declaration "data"

    filters: {
        format_number: function(value) {
            return numeral(value).format("0,0");
        } // End of function "format_number"
    }, // End of vue.js declaration "filters"

    created() {
        // Never processing on load
        this.processing = false;

        // Hook scroll event
        window.addEventListener('scroll', this.onScrollEvent);
    }, // End of vue.js declaration "created"

    destroyed() {
        window.removeEventListener('scroll', this.onScrollEvent);
    }, // End of vue.js declaration "destroyed"

    methods: {
        onScrollEvent() {
            // Watch for the end of the page
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                this.next_page();
            } // End of if "Are we close to the end"
        }, // End of function "onScrollEvent"

        // Empty the results
        reset() {
            // Empty results array
            this.results = new Array();

            // Reset top tracks
            var top_tracks = this.$parent.$refs.top_tracks;
            top_tracks.reset();

            document.getElementById('no-results').style.display = '';
        }, // End of function "reset"

        pre_execution() {
            // Report that we're in a processing session
            this.processing = true;

            // Empty error messages
            document.getElementById('error').innerHTML = '';

            // Show loading icon
            document.getElementById('spinner').style.display = '';

            // Hide messages
            document.getElementById('no-results').style.display = 'none';
            document.getElementById('end-of-list').style.display = 'none';
            document.getElementById('error').style.display = 'none';
        }, // End of function "pre_execution"

        post_execution() {
            // Always hide loading icon
            document.getElementById('spinner').style.display = 'none';

            if (typeof this.response.artists !== 'undefined') {
                // Show no results message
                if (this.response.artists.items.length == 0) {
                    document.getElementById('no-results').style.display = '';
                } // End of if "Do we have any artists to show"

                // Check to see if there can be anything else
                if ((this.response.artists.items.length > 0) && (this.response.artists.next === null)) {
                    document.getElementById('end-of-list').style.display = '';
                } // End of if "Do we have any artists and are we at the end of our list"
            } else {
                // No artists, no results
                document.getElementById('no-results').style.display = '';
            } // End of if "Do we have any items to evaluate against"

            // Now we can report that we've finished processing
            this.processing = false;
        }, // End of function "post_execution"

        error_encountered(message) {
            // Generate notification
            var notification_component = Vue.extend(notification);
            var notification_instance = new notification_component({
                propsData: {
                    type: 'fatal',
                    title: 'Fatal Error',
                    message: message,
                }
            });
            notification_instance.$mount();
            this.$refs.error_container.appendChild(notification_instance.$el);

            // Show container
            document.getElementById('error').style.display = '';
        }, // End of function "error_encountered"

        process_results(response) {
            // Create a hook for `this` for inside the loop
            var _self = this;

            // Save the raw response
            this.response = response.data

            // Check for a positive artist list
            if (response.data.artists.items.length > 0) {
                response.data.artists.items.forEach(function(artist) {
                    _self.results.push(artist);
                });
            } // End of if "Do we have any artists"

            // Run post-execution tasks
            this.post_execution();
        }, // End of function "process_results"

        next_page() {
            // Check for processing flag
            if (this.processing === true) {
                return;
            } // End of if "We cant process two at the same time"

            // Run pre-execution tasks
            this.pre_execution();

            // Check we can go to the next page
            if (this.response.artists.next === null) {
                // We have nothing, so we can stop now
                this.post_execution();

                // Return nothing
                return;
            } // End of if "Do we have a next page to load"

            // Get the offset from the next URL
            let regex_result;
            const regex = /query=(.*?)&.*?offset=([0-9]+)&/gm;
            regex_result = regex.exec(this.response.artists.next);

            // Build postdata
            var data = {
                q: regex_result[1],
                offset: regex_result[2]
            };

            axios.post('/api/spotify/search/artist', data)
                .then(response => {
                    this.process_results(response);
                }).catch(err => {
                    // eslint-disable-next-line no-console
                    console.error(err);

                    this.error_encountered(error);

                    // Still run post-execution
                    this.post_execution();
                });
        }, // End of function "next_page"

        get_top_tracks: function(element) {
            // Get parent TR
            var parent_tr = this.find_parent_tr(element.target);
            var element_data = parent_tr.dataset;

            // Pass it on
            var top_tracks_component = this.$parent.$children.find(child => { return child.$options.name === "section-top_tracks"; });
            top_tracks_component.fetch_tracks(element_data.artist_name, element_data.artist_id);
        }, // End of function "get_top_tracks"

        // Source: https://stackoverflow.com/a/2524345
        find_parent_tr: function(element) {
            var parent = element.parentNode;
            while(true) {
              if (parent == null) {
                return;
              }
              if(parent.nodeName === "TR") {
                return parent;
              }
              parent = parent.parentNode;
            }
        }, // End of function "find_parent_tr"
    } // End of vue.js declaration "methods"
} // End of export "default"
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


.notification-container {
    width: fit-content;
    margin-left: auto;
    margin-right: auto;
}
</style>
