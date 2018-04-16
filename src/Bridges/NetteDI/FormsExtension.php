<?php

/**
 * This file is part of the Nextras community extensions of Nette Framework
 *
 * @license    MIT
 * @link       https://github.com/nextras/forms
 */

namespace Tvaliasek\NextrasFormsFork\Bridges\NetteDI;

use Nette\DI\CompilerExtension;
use Nette\Forms\Container;
use Nette\PhpGenerator\ClassType;
use Nette\Utils\ObjectMixin;
use Tvaliasek\NextrasFormsFork\Controls;


class FormsExtension extends CompilerExtension
{
	public function beforeCompile()
	{
		parent::beforeCompile();
	}


	public function afterCompile(ClassType $class)
	{
		$init = $class->getMethods()['initialize'];
		$init->addBody(__CLASS__ . '::registerControls();');
	}


	public static function registerControls()
	{
		ObjectMixin::setExtensionMethod(Container::class, 'addDatePicker', function (Container $container, $name, $label = null) {
			return $container[$name] = new Controls\DatePicker($label);
		});
		ObjectMixin::setExtensionMethod(Container::class, 'addDateTimePicker', function (Container $container, $name, $label = null) {
			return $container[$name] = new Controls\DateTimePicker($label);
		});
	}
}
