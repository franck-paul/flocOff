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

$new_version = dcCore::app()->plugins->moduleInfo('flocOff', 'version');
$old_version = dcCore::app()->getVersion('flocOff');

if (version_compare((string) $old_version, $new_version, '>=')) {
    return;
}

try {
    // Default blog settings
    dcCore::app()->blog->settings->addNamespace('flocoff');
    dcCore::app()->blog->settings->flocoff->put('enabled', true, 'boolean', 'Enabled', false, true);

    dcCore::app()->setVersion('flocOff', $new_version);

    return true;
} catch (Exception $e) {
    dcCore::app()->error->add($e->getMessage());
}

return false;
