<?php
/*
  Plugin Name: Event Espresso - React Form Example
  Plugin URI: http://www.eventespresso.com
  Description: Demonstrates usage of the new Event Espresso React Form System
  Version: 0.0.1.rc.001
  Author: Event Espresso
  Author URI: http://www.eventespresso.com
  Copyright 2016 Event Espresso (email : support@eventespresso.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA02110-1301USA
 *
 * ------------------------------------------------------------------------
 *
 * Event Espresso
 *
 * Event Registration and Management Plugin for WordPress
 *
 * @ package	Event Espresso
 * @ author		Event Espresso
 * @ copyright	(c) 2008-2016 Event Espresso  All Rights Reserved.
 * @ license	http://eventespresso.com/support/terms-conditions/   * see Plugin Licensing *
 * @ link		http://www.eventespresso.com
 * @ version	EE4
 *
 * ------------------------------------------------------------------------
 */
if (defined('PHP_VERSION_ID') && PHP_VERSION_ID >= 50600) {
    add_action(
        'AHEE__EE_System__load_espresso_addons',
        function() {
            EE_Psr4AutoloaderInit::psr4_loader()->addNamespace('EventEspresso\ReactFormExample', __DIR__);
            EventEspresso\core\domain\DomainFactory::getShared(
                new EventEspresso\core\domain\values\FullyQualifiedName(
                    'EventEspresso\ReactFormExample\src\domain\Domain'
                ),
                array(
                    new EventEspresso\core\domain\values\FilePath(__FILE__),
                    EventEspresso\core\domain\values\Version::fromString('1.0.0.rc.000'),
                )
            );
            EE_Dependency_Map::instance()->add_alias(
                'EventEspresso\ReactFormExample\src\domain\Domain',
                'EventEspresso\core\domain\DomainInterface',
                'EventEspresso\ReactFormExample\src\domain\services\assets\ReactFormExampleAssetManager'
            );
            EE_Dependency_Map::instance()->registerDependencies(
                'EventEspresso\ReactFormExample\src\domain\services\assets\ReactFormExampleAssetManager',
                [
                    'EventEspresso\core\services\assets\AssetCollection' => EE_Dependency_Map::load_from_cache,
                    'EventEspresso\ReactFormExample\src\domain\Domain'   => EE_Dependency_Map::load_from_cache,
                    'EventEspresso\core\services\assets\Registry'        => EE_Dependency_Map::load_from_cache
                ]
            );
            EE_Dependency_Map::instance()->registerDependencies(
                'EventEspresso\ReactFormExample\src\ui\admin\ReactFormExampleAdmin',
                array(
                    'EventEspresso\ReactFormExample\src\domain\services\assets\ReactFormExampleAssetManager' => EE_Dependency_Map::load_from_cache
                )
            );
        }
    );
    add_action(
        'current_screen',
        function() {
            $screen = get_current_screen();
            if($screen instanceof WP_Screen && $screen->id === 'toplevel_page_espresso_events') {
                /** @var EventEspresso\ReactFormExample\src\ui\admin\ReactFormExampleAdmin $admin */
                $admin = EventEspresso\core\services\loaders\LoaderFactory::getLoader()->getShared(
                    'EventEspresso\ReactFormExample\src\ui\admin\ReactFormExampleAdmin'
                );
                $admin->setHooks();
            }
        }
    );
}

// location: wp-content/plugins/eea-react-form-example/eea-react-form-example.php
