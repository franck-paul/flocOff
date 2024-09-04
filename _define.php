<?php
/**
 * @brief flocOff, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Franck Paul and contributors
 *
 * @copyright Franck Paul carnet.franck.paul@gmail.com
 * @copyright GPL-2.0
 */
$this->registerModule(
    'flocOff',
    'Disable Google FLoC tracking',
    'Franck Paul and contributors',
    '5.1',
    [
        'requires'    => [['core', '2.28']],
        'permissions' => 'My',
        'type'        => 'plugin',
        'settings'    => [
            'blog' => '#params.flocoff',
        ],

        'details'    => 'https://open-time.net/?q=flocOff',
        'support'    => 'https://github.com/franck-paul/flocOff',
        'repository' => 'https://raw.githubusercontent.com/franck-paul/flocOff/main/dcstore.xml',
    ]
);
