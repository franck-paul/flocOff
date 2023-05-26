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

use dcNamespace;
use Dotclear\Helper\Html\Form\Checkbox;
use Dotclear\Helper\Html\Form\Fieldset;
use Dotclear\Helper\Html\Form\Label;
use Dotclear\Helper\Html\Form\Legend;
use Dotclear\Helper\Html\Form\Para;

class BackendBehaviors
{
    public static function adminBlogPreferencesForm($settings)
    {
        echo
        (new Fieldset('flocoff'))
        ->legend((new Legend(__('Google FLoC tracking'))))
        ->fields([
            (new Para())->items([
                (new Checkbox('flocoff_enabled', $settings->get(My::id())->enabled))
                    ->value(1)
                    ->label((new Label(__('Disable Google FLoC tracking for this blog (<a href="https://github.com/WICG/floc" hreflang="en">more information</a>)'), Label::INSIDE_TEXT_AFTER))),
            ]),
        ])
        ->render();
    }

    public static function adminBeforeBlogSettingsUpdate($settings)
    {
        $settings->get(My::id())->put('enabled', !empty($_POST['flocoff_enabled']), dcNamespace::NS_BOOL);
    }
}
