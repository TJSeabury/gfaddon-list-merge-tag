<?php namespace tjseabury\gfaddon\lmt;

/*
Plugin Name: Gravity Forms List Merge Tag
Plugin URI: 
Description: A simple add-on to add selectable columns to list merge tags.
Version: 0.1.0
Author: Tyler Seabury
Author URI: https://tylerseabury.com/

------------------------------------------------------------------------

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

require_once realpath( __DIR__ . '/vendor/autoload.php' );

use function \add_action;
use \GFAddOn;

define( 'GFAddOn_ListMergeTag_VERSION', '0.1.0' );

add_action(
    'gform_loaded',
    [
        __NAMESPACE__ . '\\GFAddOnLMTBootstrap',
        'load'
    ],
    5
);

class GFAddOnLMTBootstrap {

    public static function load() {

        if ( ! method_exists( 'GFForms', 'include_addon_framework' ) ) {
            return;
        }

        GFAddOn::register( ListMergeTag::class );
    }

}