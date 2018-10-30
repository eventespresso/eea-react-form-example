<?php

namespace EventEspresso\ReactFormExample\src\domain\services\assets;

use DomainException;
use \EventEspresso\core\domain\services\assets\CoreAssetManager;
use EventEspresso\core\exceptions\InvalidDataTypeException;
use EventEspresso\core\exceptions\InvalidEntityException;
use EventEspresso\core\services\assets\AssetManager;
use EventEspresso\core\services\collections\DuplicateCollectionIdentifierException;

/**
 * Class ReactFormExampleAssetManager
 *
 * @package EventEspresso\RecurringEvents\src\domain\services\assets\ReactFormExampleAssetManager
 * @author  Brent Christensen
 * @since   $VID:$
 */
class ReactFormExampleAssetManager extends AssetManager
{
    const JS_HANDLE_REACT_FORM_APP = 'eea-react-form-example-app';
    const CSS_HANDLE_REACT_FORM_APP = 'eea-react-form-example-app';
    const ASSET_CHUNK_NAME = 'example-form-app';

    /**
     * @since 4.9.62.p
     * @throws DomainException
     * @throws InvalidDataTypeException
     * @throws InvalidEntityException
     * @throws DuplicateCollectionIdentifierException
     */
    public function addAssets()
    {
        $this->registerJavascript();
        $this->registerStyleSheets();
    }


    /**
     * Register javascript assets
     *
     * @throws DomainException
     * @throws InvalidDataTypeException
     * @throws InvalidEntityException
     * @throws DuplicateCollectionIdentifierException
     */
    private function registerJavascript()
    {
        $this->addJavascript(
            self::JS_HANDLE_REACT_FORM_APP,
            $this->registry->getJsUrl(
                $this->domain->assetNamespace(),
                self::ASSET_CHUNK_NAME
            ),
            [
                CoreAssetManager::JS_HANDLE_EE_COMPONENTS,
                // self::JS_HANDLE_RRULE
            ]
        )
            ->setRequiresTranslation()
            ->setVersion($this->domain->version());
    }


    /**
     * Register CSS assets.
     *
     * @throws DomainException
     * @throws DuplicateCollectionIdentifierException
     * @throws InvalidDataTypeException
     * @throws InvalidEntityException
     */
    private function registerStyleSheets()
    {
        $this->addStylesheet(
            self::CSS_HANDLE_REACT_FORM_APP,
            $this->registry->getCssUrl(
                $this->domain->assetNamespace(),
                self::ASSET_CHUNK_NAME
            ),
            [CoreAssetManager::CSS_HANDLE_EE_COMPONENTS ]
        );
    }
}
