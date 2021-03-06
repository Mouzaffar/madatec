<?php
/**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchQuery;
use PrestaShop\PrestaShop\Core\Product\Search\SortOrder;
use PrestaShop\PrestaShop\Adapter\NewProducts\NewProductsProductSearchProvider;

class NewProductsControllerCore extends ProductListingFrontController
{
    public $php_self = 'new-products';

    /**
     * Initializes controller.
     *
     * @see FrontController::init()
     *
     * @throws PrestaShopException
     */
    public function init()
    {

   	if (!$this->context->customer->isLogged()) {
            //header('HTTP/1.1 403 Forbidden');
            //header('Status: 403 Forbidden');
            Tools::redirect('authentication?from=category');

        }

        parent::init();

        $this->doProductSearch('catalog/listing/new-products');
    }

    protected function getProductSearchQuery()
    {
        $query = new ProductSearchQuery();
        $query
            ->setQueryType('new-products')
            ->setSortOrder(new SortOrder('product', 'date_add', 'desc'))
        ;

        return $query;
    }

    protected function getDefaultProductSearchProvider()
    {
        return new NewProductsProductSearchProvider(
            $this->getTranslator()
        );
    }

    public function getListingLabel()
    {
        return $this->trans(
            'New products',
            array(),
            'Shop.Theme.Catalog'
        );
    }
}
