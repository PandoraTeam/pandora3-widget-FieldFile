<?php
namespace Pandora3\Widgets\FieldFile;

use Pandora3\Widgets\FormField\FormField;

class FieldFile extends FormField {

	protected function getView(): string {
		return __DIR__.'/Views/Widget';
	}

	protected function beforeRender(array $context): array {
		$context = parent::beforeRender($context);
		if ($context['disabled'] ?? false) {
			$attribs = $context['attribs'] ?? '';
			$context['attribs'] = $attribs.' disabled';
		}
		return $context;
	}

}