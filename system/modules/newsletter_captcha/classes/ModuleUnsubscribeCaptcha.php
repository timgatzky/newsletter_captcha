<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2017
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		newsletter_captcha
 * @link		http://contao.org
 * @license		http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

class ModuleUnsubscribeCaptcha extends \ModuleUnsubscribe
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'nl_captcha';
	
	
	/**
	 * Generate the module
	 */
	protected function compile()
	{
		$objCaptcha = new $GLOBALS['TL_FFL']['captcha'];	
		$objCaptcha->__set('id','newsletter_captcha_'.$this->id);
		$objCaptcha->__set('label',$GLOBALS['TL_LANG']['MSC']['securityQuestion']);
		$objCaptcha->__set('placeholder',$GLOBALS['TL_LANG']['MSC']['securityQuestion']);
		
		// validate the captcha on form submit
		if(\Input::post('FORM_SUBMIT') == 'tl_unsubscribe')
		{
			$objCaptcha->validate();
		}
		
		// if captcha has errors, store the errors and reload the page
		if($objCaptcha->hasErrors())
		{
			$_SESSION['UNSUBSCRIBE_ERROR'] = $objCaptcha->getErrorsAsString();
			$this->reload();
		}
		
		// compile parent module
		parent::compile();
		
		// add captcha widget to template
		$this->Template->captcha = $objCaptcha->parse();
	}
}