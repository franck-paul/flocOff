<?php
/**
 * @brief flocOff, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Franck Paul
 *
 * @copyright Franck Paul carnet.franck.paul@gmail.com
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
if (!defined('DC_CONTEXT_ADMIN')) {
    return;
}

$new_version = $core->plugins->moduleInfo('flocOff', 'version');
$old_version = $core->getVersion('flocOff');

if (version_compare($old_version, $new_version, '>=')) {
    return;
}

try {
    // Default blog settings
    $core->blog->settings->addNamespace('flocoff');
    $core->blog->settings->flocoff->put('enabled', false, 'boolean', 'Enabled', false, true);

    $core->setVersion('flocOff', $new_version);

    return true;
} catch (Exception $e) {
    $core->error->add($e->getMessage());
}

return false;
