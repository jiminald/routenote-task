<?php

    // Load bootstrap
    require __DIR__.'/../lib/bootstrap.php';

    Flight::before('start', function(&$params, &$output){
        // Start a Spotify API Session
        $session = new SpotifyWebAPI\Session(
            $_ENV['spotify_api_client_id'],
            $_ENV['spotify_api_client_secret']
        );

        // Check for local access token
        $refresh_credentials = FALSE;
        if (file_exists($_SERVER['PROJECT_ROOT'].'/.access.token') == TRUE) {
            // Load our existing token
            $access_token = trim(file_get_contents($_SERVER['PROJECT_ROOT'].'/.access.token'));
            $expires_in = trim(file_get_contents($_SERVER['PROJECT_ROOT'].'/.expirationTime'));

            // Check to see if the token has expired
            if (time() >= $expires_in) {
                $refresh_credentials = TRUE;
            } // End of if "Are we past the token's expiration date"
        } else {
            // No token, then we need to get one
            $refresh_credentials = TRUE;
        } // End of if "Do we have an access token"

        // Do we need to refresh our credential token
        if ($refresh_credentials == TRUE) {
            // Get an access token
            $session->requestCredentialsToken();
            $access_token = $session->getAccessToken();

            // Save to storage
            file_put_contents($_SERVER['PROJECT_ROOT'].'/.access.token', $access_token);
            file_put_contents($_SERVER['PROJECT_ROOT'].'/.expirationTime', $session->getTokenExpiration());
        } // End of if "Do we have an access token"

        // Set the access token on the session
        $session->setAccessToken($access_token);

        // Setup Spotify API
        Flight::set('spotify', new SpotifyWebAPI\SpotifyWebAPI());
        Flight::get('spotify')->setSession($session);
        Flight::get('spotify')->setOptions([
            'auto_refresh' => true,
        ]);
        // Flight::get('spotify')->setAccessToken($access_token);
    });


    // Load controllers
    $base_path = $_SERVER['PROJECT_ROOT'].'/controllers/';
    foreach ($iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($base_path, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::SELF_FIRST) as $item) {
        // Get the file and path
        $command_file = $iterator->getSubPathName();

        // We only deal with files
        if ($item->isFile() == TRUE) {
            // Get the file in
            require $base_path.$command_file;

            // Load the class
            $command_class = substr($command_file, 0, strrpos($command_file, '.'));
            $command_class = str_replace('/', '_', $command_class).'_controller';
            $command_class = new $command_class;
            $command_class->_routes();
        } // End of if "Make sure we only deal in files"
    } // End of foreach "Recursively loading all commands"

    // Start FlightPHP
    Flight::start();
