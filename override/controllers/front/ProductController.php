<?php

class ProductController extends ProductControllerCore
{
    public function initContent()
    {
		 if (!$this->context->customer->isLogged()) {
            header('HTTP/1.1 403 Forbidden');
            header('Status: 403 Forbidden');
            Tools::redirect('authentication?from=category');

        }
        parent::initContent();
    }
}
