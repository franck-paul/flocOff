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
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
declare(strict_types=1);

namespace Dotclear\Plugin\flocOff;

use dcCore;
use dcNamespace;
use dcNsProcess;
use Exception;

class Install extends dcNsProcess
{
    public static function init(): bool
    {
        static::$init = My::checkContext(My::INSTALL);

        return static::$init;
    }

    public static function process(): bool
    {
        if (!static::$init) {
            return false;
        }

        try {
            // Update
            $old_version = dcCore::app()->getVersion(My::id());
            if (version_compare((string) $old_version, '3.0', '<')) {
                // Rename settings namespace
                if (dcCore::app()->blog->settings->exists('flocoff')) {
                    dcCore::app()->blog->settings->delNamespace(My::id());
                    dcCore::app()->blog->settings->renNamespace('flocoff', My::id());
                }
            }

            // Default blog settings
            dcCore::app()->blog->settings->get(My::id())->put('enabled', true, dcNamespace::NS_BOOL, 'Enabled', false, true);
        } catch (Exception $e) {
            dcCore::app()->error->add($e->getMessage());
        }

        return true;
    }
}
