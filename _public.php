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
if (!defined('DC_RC_PATH')) {
    return;
}

$core->addBehavior('urlHandlerServeDocumentHeaders', ['flocOffPublic', 'urlHandlerServeDocumentHeaders']);

class flocOffPublic
{
    public static function urlHandlerServeDocumentHeaders($headers)
    {
        global $core;

        $core->blog->settings->addNameSpace('flocoff');
        if (!$core->blog->settings->flocoff->enabled) {
            return;
        }
        $headers->append('Permissions-Policy: interest-cohort=()');
    }
}
