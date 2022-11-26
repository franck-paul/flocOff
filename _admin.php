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
if (!defined('DC_CONTEXT_ADMIN')) {
    return;
}

// dead but useful code, in order to have translations
__('flocOff') . __('Disable Google FLoC tracking');

class flocOffBehaviors
{
    public static function adminBlogPreferencesForm($settings)
    {
        $settings->addNameSpace('flocoff');
        echo
        '<div class="fieldset"><h4 id="flocoff">' . __('Google FLoC tracking') . '</h4>' .
            '<p><label class="classic">' .
            form::checkbox('flocoff_enabled', '1', $settings->flocoff->enabled) .
            __('Disable Google FLoC tracking for this blog (<a href="https://github.com/WICG/floc" hreflang="en">more information</a>)') . '</label></p>' .
        '</div>';
    }

    public static function adminBeforeBlogSettingsUpdate($settings)
    {
        $settings->addNameSpace('flocoff');
        $settings->flocoff->put('enabled', !empty($_POST['flocoff_enabled']), 'boolean');
    }
}

dcCore::app()->addBehavior('adminBlogPreferencesFormV2', [flocOffBehaviors::class, 'adminBlogPreferencesForm']);
dcCore::app()->addBehavior('adminBeforeBlogSettingsUpdate', [flocOffBehaviors::class, 'adminBeforeBlogSettingsUpdate']);
