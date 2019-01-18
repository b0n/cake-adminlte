<?php
use Cake\Core\Configure;
use Cake\Core\Plugin;

Configure::write('AdminLTE', [
    'links' => [
        'logout' => null,
        'profile' => false,
        'forgot' => false,
        'dashboard' => '/admin'
    ],
    'texts' => [
        'forgot' => 'I forgot my password',
        'logo-mini' => '<b>A</b>LT',
        'logo' => '<b>Admin</b>LTE'
    ],
    'skin' => 'black',
    'layout' => ''
]);

if (file_exists(CONFIG . 'adminlte.php')) {
    Configure::load('adminlte');
}
