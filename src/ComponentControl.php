<?php

/**
 * This file is part of the Nextras community extensions of Nette Framework
 *
 * @license    MIT
 * @link       https://github.com/nextras/forms
 */

namespace Tvaliasek\NextrasFormsFork;

use Nette;
use Nette\Application\UI\IRenderable;
use Nette\Application\UI\ISignalReceiver;
use Nette\ComponentModel\IContainer;
use Nette\Forms\Controls\BaseControl;
use Tvaliasek\NextrasFormsFork\Controls\Fragments\TemplateControlTrait;


/**
 * Base form control with Nette Component model support.
 */
abstract class ComponentControl extends BaseControl implements ISignalReceiver, \ArrayAccess, IContainer, IRenderable
{
	use TemplateControlTrait {
		attached as componentControlAttached;
	}


	public function __construct($caption = null)
	{
		parent::__construct($caption);
		$this->control = Nette\Utils\Html::el('div');
	}


	protected function attached($component)
	{
		parent::attached($component);
		$this->componentControlAttached($component);
	}
}
