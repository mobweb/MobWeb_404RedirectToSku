<?php
/**
 * @author    Louis Bataillard <info@mobweb.ch>
 * @package    MobWeb_404RedirectToSku
 * @copyright    Copyright (c) MobWeb GmbH (https://mobweb.ch)
 */

class MobWeb_404RedirectToSku_Model_Observer
{
    /**
     * @param Varien_Event_Observer $observer
     * @return MobWeb_404RedirectToSku_Model_Observer $this
     */
    public function controllerActionPredispatchCmsIndexNoRoute(Varien_Event_Observer $observer)
    {
        // Get the path, strip leading and trailing slashes
        $path = Mage::getSingleton('core/url')->parseUrl(Mage::helper('core/url')->getCurrentUrl())->getPath();
        $path = trim($path, '/');
        if ($path) {

            // Check if a product exists with the path as its SKU
            $product = Mage::getModel('catalog/product')->loadByAttribute('sku', $path);
            if ($product && $product->getId()) {

                // Check if the product can be shown under the current configuration
                $productHelper = Mage::helper('catalog/product');
                if ($productHelper->canShow($product)) {

                    // Get the product's URL
                    $productUrlKey = $product->getUrlKey();
                    if ($productUrlKey) {

                        // Send the redirect to the full URL
                        header('HTTP/1.1 301 Moved Permanently'); 
                        header('Location: ' . Mage::getUrl($productUrlKey)); 
                        exit();
                    }
                }
            }
        }

        return $this;
    }
}