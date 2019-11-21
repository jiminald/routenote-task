<?php

    // Get project root
    $_SERVER['PROJECT_ROOT'] = dirname(__DIR__, 1);

    // Include composer autoload
    require $_SERVER['PROJECT_ROOT'].'/vendor/autoload.php';

    // Load Environment variables
    use Symfony\Component\Dotenv\Dotenv;
    $dotenv = new Dotenv();
    $dotenv->load($_SERVER['PROJECT_ROOT'].'/.env');

    // Set environment
    $_ENV['ENVIRONMENT'] = 'production';

    // Do we have a development environment file to include
    if (file_exists($_SERVER['PROJECT_ROOT'].'/.env.dev') == TRUE) {
        $dotenv->overload($_SERVER['PROJECT_ROOT'].'/.env.dev');

        // Set environment
        $_ENV['ENVIRONMENT'] = 'development';
    } // End of if "Do we have an development environment file"
