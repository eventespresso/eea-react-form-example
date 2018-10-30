<?php

namespace EventEspresso\ReactFormExample\src\ui\admin;

use DomainException;
use EEH_HTML;
use EventEspresso\ReactFormExample\src\domain\services\assets\ReactFormExampleAssetManager;
use Exception;



/**
 * ReactFormExampleAdmin
 * logic for hooking into Events Admin Pages.
 *
 * @package EventEspresso\RecurringEvents\src\ui
 * @author  Brent Christensen
 * @since   $VID:$
 */
class ReactFormExampleAdmin
{

    /**
     * @var ReactFormExampleAssetManager $asset_manager
     */
    public $asset_manager;


    /**
     * ReactFormExampleAdmin constructor.
     *
     * @param ReactFormExampleAssetManager $asset_manager
     */
    public function __construct(ReactFormExampleAssetManager $asset_manager)
    {
        $this->asset_manager = $asset_manager;
    }


    public function setHooks() {
        add_action(
            'AHEE__espresso_events_Pricing_Hooks___pricing_metabox__start',
            array($this, 'exampleForm')
        );
        add_action('admin_enqueue_scripts', array($this, 'enqueueScripts'));
    }


    /**
     * enqueue_scripts - Load the scripts and css
     *
     * @return void
     * @throws DomainException
     */
    public function enqueueScripts()
    {
        wp_enqueue_style(ReactFormExampleAssetManager::CSS_HANDLE_REACT_FORM_APP);
        wp_enqueue_script(ReactFormExampleAssetManager::JS_HANDLE_REACT_FORM_APP);
    }


    /**
     * @return void
     * @throws \InvalidArgumentException
     * @throws \EventEspresso\core\exceptions\InvalidInterfaceException
     * @throws \EventEspresso\core\exceptions\InvalidDataTypeException
     * @throws \LogicException
     * @throws \EE_Error
     * @throws Exception
     */
    public function exampleForm($EVT_ID)
    {
        echo EEH_HTML::div(
            EEH_HTML::h1('React Form System Example'),
            'espresso-react-form-example-div'
        );
    }



}
// End of file RecurringEventsAdmin.php
// Location: /ui/admin/RecurringEventsAdmin.php
