<?php namespace tjseabury\gfaddon\lmt;

use \GFAddOn;

/**
 * @see: https://stackoverflow.com/questions/1818765/extend-abstract-singleton-class
 */
abstract class GFAddOnAbstractSingleton extends GFAddOn {
    use AbstractSingleton;

    public static function get_instance() {
        return self::getInstance();
    }
}