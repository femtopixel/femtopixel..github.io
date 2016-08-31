<?php
/**
 * Index Controller
 *
 * @package    Femto
 * @subpackage Controller
 * @author     Jeremy MOULIN <jeremy.moulin@doonoyz.com>
 * @copyright  2008-2009
 * @version    Paper
 */
class IndexController extends Zend_Controller_Action {

	public function indexAction() {
		$this->view->layout()->title = 'Accueil';
	}
	
	public function adviceAction() {
		$this->view->layout()->title = 'Conseil / Audit';
	}
	
	public function developmentAction() {
		$this->view->layout()->title = 'Développement Internet';
	}
	
	public function assistAction() {
		$this->view->layout()->title = 'Assistance';
	}
}