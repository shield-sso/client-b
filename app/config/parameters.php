<?php

if (!empty(getenv('SYMFONY_SECRET'))) {
    $container->setParameter('secret', getenv('SYMFONY_SECRET'));
}

if (!empty(getenv('DATABASE_URL'))) {
    $dbConfig = parse_url(getenv('DATABASE_URL'));

    $container->setParameter('database_host', $dbConfig['host']);
    $container->setParameter('database_port', $dbConfig['port']);
    $container->setParameter('database_name', ltrim($dbConfig['path'], '/'));
    $container->setParameter('database_user', $dbConfig['user']);
    $container->setParameter('database_password', $dbConfig['pass']);
}

if (!empty(getenv('SHIELD_SSO_URL'))) {
    $container->setParameter('shield_sso_url', getenv('SHIELD_SSO_URL'));
}

if (!empty(getenv('OAUTH_CLIENT_SECRET'))) {
    $container->setParameter('oauth_client_secret', getenv('OAUTH_CLIENT_SECRET'));
}
