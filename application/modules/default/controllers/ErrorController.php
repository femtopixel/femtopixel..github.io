<?php
/**
 * Error Controller
 *
 * @package    Gears
 * @subpackage Controller
 * @author     Jeremy MOULIN <jeremy.moulin@doonoyz.com>
 * @copyright  2008-2009
 * @version    Paper
 */
class ErrorController extends Zend_Controller_Action {

	/**
	 * Catch all the errors and do the right action
	 *
	 */
	public function errorAction() {
		$content = '';
		$errors = $this->_getParam ( 'error_handler' );

		switch ($errors->type) {
			/**
			 * If controller doesn't exists
			 */
			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER :
			/**
			 * Action doesn't exists
			 */
			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION :
				$this->getResponse ()->setRawHeader ( 'HTTP/1.1 404 Not Found' );

				$content = tr( "The page you requested was not found." );
				break;
			/**
			 * Any other error
			 */
			default :
				// application error
				$this->getResponse ()->setRawHeader ( 'HTTP/1.1 500 Internal Server Error' );
				$content = tr( "An unexpected error occurred with your request. Please try again later." );
				if (ENVIRONMENT == 'dev') {
					$content .= "<pre>";
					if ($errors['exception'] instanceof Exception) {
					   $content .= $errors['exception']->getMessage() . '<br/>';
					}
					$content .= debug_backtrace ();
					$content .= "</pre>";
				}
				break;
		}

		// Clear previous content
		$this->view->content = $content;
	}
}
