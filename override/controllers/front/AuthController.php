<?php


class AuthController extends AuthControllerCore
{
    public function initContent()
    {
		
		//Affichage d'un message d'information quand on arrive d'une categorie sans etre connecté
		$from = Tools::getValue('from');
		if($from=="category") {
			//$this->info[] = $this->trans('You do not have access to this category.', array(), 'Shop.Notifications.Error');
		}
		
		parent::initContent();
		

	}
}
