<?php

use Cake\Core\Plugin;
use Cake\Mailer\Email;

$emailFrom = read('App.email', 'no-reply@' . env('HTTP_HOST'));
$emailFrom = [$emailFrom => $emailFrom];

$emailProfiles = ['default' => [
    'from' => $emailFrom,
    'sender' => $emailFrom,
    'replyTo' => $emailFrom,
    'layout' => 'default',
    'template' => null,
    'viewRender' => 'Cake\View\View',
    'theme' => null,
    'helpers' => ['Html'],
    'emailFormat' => 'both',
    'transport' => 'default',
]];

if (Plugin::loaded('Gourmet/Email')) {
    $emailProfiles['default']['layout'] = 'Gourmet/Email.default';
    $emailProfiles['default']['helpers'][] = 'Gourmet/Email.Email';
}

foreach (consume('Email.profiles', []) as $emailProfile => $emailProfileConfig) {
    $emailProfiles[$emailProfile] = $emailProfileConfig + $emailProfiles['default'];
}

Email::config($emailProfiles);

$emailTransports = ['default' => [
    'className' => 'Smtp',
    'host' => 'localhost',
    'port' => 1025,
    'timeout' => 30,
    'client' => null,
    'tls' => null,
]];

foreach (consume('Email.transports', []) as $emailTransport => $emailTransportConfig) {
    $emailTransports[$emailTransport] = $emailTransportConfig + $emailTransports['default'];
}

Email::configTransport($emailTransports);

unset(
    $emailFrom,
    $emailProfiles,
    $emailProfile,
    $emailProfileConfig,
    $emailTransport,
    $emailTransports,
    $emailTransportConfig
);
