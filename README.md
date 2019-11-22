# Routenote/Push.FM - Full Stack Developer Task

## Project setup

Both vue.js and PHP dependencies need to be installed. In a terminal, go to the root of the project and run the following commands.

```
yarn install
composer install
```

## Development Execution

For vue.js, go the root of the project and run `yarn serve`

For PHP, you will need to be in the public/ folder.\
If you have the symfony server installed, run `symfony server:start`\
If you prefer to use the built-in PHP server, run `php -t ./ -S 0.0.0.0:8000`

## Configuration

All configuration is stored in `.env`, which is found in the root of the project.

If you want to override any of these settings in development, create a file called `.env.dev` in the root of the project. Here you can apply individual override settings using any of the configuration keys shown below.


Example `.env` file:
```env
# Spotify
spotify_api_client_id=ThisIdentifiesTheAppWithSpotify
spotify_api_client_secret=DoNotShareThisSecretKey
spotify_api_search_limit=15
```

### spotify_api_client_id and spotify_api_client_secret
Before using this application, you will need to create an app at [Spotify’s developer site](https://developer.spotify.com/web-api/).\
Here you'll be given a Client ID and Client Secret that needs to be put in the `.env` file.

### spotify_api_search_limit
Default: 10\
You can set how many results are returned in the artist search by configuring this option. If one is not set, the application will default back to 10
