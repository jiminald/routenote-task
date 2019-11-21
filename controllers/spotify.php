<?php

    class spotify_controller {

        public function _routes() {
            Flight::route('GET /api/spotify/artist/@artist_id/top_tracks', array($this, 'get_spotify_singleartist_toptracks'));

            Flight::route('POST /api/spotify/search/artist', array($this, 'post_spotify_search_artist'));
        } // End of function "_routes"

        public function post_spotify_search_artist() {
            // Set default options
            $options = [
                'offset' => 0,
                'limit' => $_ENV['spotify_api_search_limit'],
            ];

            // Get query
            $query = trim(Flight::request()->data->q);

            // Do we need to set an offset
            if (Flight::request()->data['offset'] != NULL) {
                $options['offset'] = Flight::request()->data['offset'];
            } // End of if "Do we have a custom offset to apply"

            // Query Spotify
            $data = Flight::get('spotify')->search($query, 'artist', $options);

            // Format response
            Flight::json($data);
        } // End of function "post_spotify_search_artist"


        public function get_spotify_singleartist_toptracks($artist_id) {
            $tracks = Flight::get('spotify')->getArtistTopTracks($artist_id, [
                'country' => 'gb'
            ]);

            // Format response
            Flight::json($tracks);
        } // End of function "get_spotify_singleartist_toptracks"

    } // End of class "spotify_controller"
