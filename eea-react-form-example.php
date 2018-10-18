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


use EventEspresso\core\services\loaders\LoaderFactory;

add_action(
    'AHEE__espresso_events_Pricing_Hooks___pricing_metabox__start',
    function() {
        echo '<div id="espresso-react-form-example-div"><h1>React Form System Example</h1></div>';
        /** @var EventEspresso\core\domain\services\assets\EspressoEditorAssetManager $editor */
        $editor = LoaderFactory::getLoader()->getShared(
            'EventEspresso\core\domain\services\assets\EspressoEditorAssetManager'
        );
        $editor->addJavascript(
            'espresso_react_form_example',
            plugin_dir_url(__FILE__) . 'index.js',
            ['eventespresso-editor']
        )
               ->setRequiresTranslation();
    }
);


// add_action(wp-content/plugins/eea-react-form-example/eea-react-form-example.php:61
//     'admin_print_footer_scripts',
//     function () {
//         $screen = get_current_screen();
//         if ( $screen->id !== 'espresso_events') {
//             return;
//         }
//         $script = '<script src="https://unpkg.com/react@15/dist/react.js"></script>';
//         $script .= '<script src="https://unpkg.com/react-dom@15/dist/react-dom.js"></script>';
//         $script .= '<script type="module" src="' . plugin_dir_url(__FILE__) . 'index.js" </script>';
//         echo $script;
//         // add_filter(
//         //     'clean_url',
//         //     'espresso_allow_react_form_example',
//         //     10, 3
//         // );
//         // add_filter(
//         //     'script_loader_src',
//         //     function ($src, $handle) {
//         //         if ($handle !== 'espresso_react_form_example') {
//         //             return $src;
//         //         }
//         //         echo '<h1>script_loader_src</h1>';
//         //         return $src . '" type="module';
//         //     },
//         //     10,
//         //     2
//         // );
//         // wp_register_script(
//         //     'espresso_react_form_example',
//         //     plugin_dir_url(__FILE__) . 'index.js',
//         //     array('eventespresso-editor'),
//         //     '0.0.1',
//         //     true
//         // );
//         // wp_enqueue_script('espresso_react_form_example');
//     },
//     999
// );


