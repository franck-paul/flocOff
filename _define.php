<?php

/**
 * @brief flocOff, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Franck Paul and contributors
 *
 * @copyright Franck Paul contact@open-time.net
 * @copyright GPL-2.0
 */
declare(strict_types=1);

if (isset($this) && is_object($this) && method_exists($this, 'registerModule') && isset($this->id) && is_string($this->id)) {
    $this->registerModule(
        'flocOff',
        'Disable Google FLoC tracking',
        'Franck Paul and contributors',
        '7.0',
        [
            'date'        => '2026-08-03T09:57:09+0200',
            'requires'    => [['core', '2.39']],
            'permissions' => 'My',
            'type'        => 'plugin',
            'settings'    => [
                'blog' => '#params.flocoff',
            ],

            'details'    => 'https://open-time.net/?q=flocOff',
            'support'    => 'https://github.com/franck-paul/flocOff',
            'repository' => 'https://raw.githubusercontent.com/franck-paul/flocOff/main/dcstore.xml',
            'license'    => 'gpl2',
        ]
    );
}
