<?php

namespace EventEspresso\ReactFormExample\src\domain;

use DomainException;
use EventEspresso\core\domain\DomainBase;

defined('EVENT_ESPRESSO_VERSION') || exit;


/**
 * Domain Class
 * A container for all domain data related to ReactFormExample
 *
 * @package     Event Espresso
 * @subpackage  Recurring Events
 * @author      Event Espresso
 */
class Domain extends DomainBase
{

    /**
     * EE Core Version Required for Add-on
     */
    const CORE_VERSION_REQUIRED = '4.9.69.rc.0000';


    /**
     * @return string
     * @throws DomainException
     */
    public function adminUiPath()
    {
        return $this->pluginPath() . 'ui/admin/';
    }


}
