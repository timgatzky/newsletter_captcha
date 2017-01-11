<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'ModuleSubscribeCaptcha' => 'system/modules/newsletter_captcha/classes/ModuleSubscribeCaptcha.php',
	'ModuleUnsubscribeCaptcha' => 'system/modules/newsletter_captcha/classes/ModuleUnsubscribeCaptcha.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'nl_captcha' => 'system/modules/newsletter_captcha/templates',
));
