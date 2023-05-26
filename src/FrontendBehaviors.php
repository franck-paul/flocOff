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

class FrontendBehaviors
{
    public static function urlHandlerServeDocumentHeaders($headers)
    {
        if (!dcCore::app()->blog->settings->get(My::id())->enabled) {
            return;
        }
        $headers->append('Permissions-Policy: interest-cohort=()');
    }
}
