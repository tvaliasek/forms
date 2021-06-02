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
use Tvaliasek\NextrasFormsFork\Controls;


class FormsExtension extends CompilerExtension
{
    public function afterCompile(ClassType $class): void
    {
        $init = $class->getMethod('initialize');
        $init->addBody(__CLASS__ . '::registerControls();');
    }

    public static function registerControls(): void
    {
        Container::extensionMethod('addDatePicker',
            function ($form, $name, $label = null) {
                $form[$name] = new Controls\DatePicker($label);
                return $form[$name];
            }
        );
        Container::extensionMethod('addDateTimePicker',
            function ($form, $name, $label = null) {
                $form[$name] = new Controls\DateTimePicker($label);
                return $form[$name];
            }
        );
    }
}
