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
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
declare(strict_types=1);

namespace Dotclear\Plugin\flocOff;

use ArrayObject;

class FrontendBehaviors
{
    /**
     * @param      ArrayObject<int, string>  $arrayObject  The headers
     */
    public static function urlHandlerServeDocumentHeaders(ArrayObject $arrayObject): string
    {
        if (!My::settings()->getBool('enabled')) {
            return '';
        }

        $arrayObject->append('Permissions-Policy: interest-cohort=()');

        return '';
    }
}
