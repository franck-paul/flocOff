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
if (!defined('DC_RC_PATH')) {
    return;
}

$this->registerModule(
    'flocOff',                      // Name
    'Disable Google FLoC tracking', // Description
    'Franck Paul and contributors', // Author
    '1.3',                          // Version
    [
        'requires'    => [['core', '2.18']], // Dependencies
        'permissions' => 'admin',            // Permissions
        'type'        => 'plugin',           // Type
        'settings'    => [
            'blog' => '#params.flocoff'
        ],

        'details'    => 'https://open-time.net/?q=flocOff',       // Details URL
        'support'    => 'https://github.com/franck-paul/flocOff', // Support URL
        'repository' => 'https://raw.githubusercontent.com/franck-paul/flocOff/master/dcstore.xml'
    ]
);
