<?php
namespace Pandora3\Widgets\FieldFile;

use Pandora3\Widgets\FormField\FormField;

/**
 * Class FieldFile
 * @package Pandora3\Widgets\FieldFile
 */
class FieldFile extends FormField {

	protected function getView(): string {
		return __DIR__.'/Views/Widget';
	}

	protected function beforeRender(array $context): array {
		if ($context['id'] ?? '') {
			$attribs = $context['attribs'] ?? '';
			$context['attribs'] = $attribs.' id="'.$context['id'].'"';
		}
		if ($context['disabled'] ?? false) {
			$attribs = $context['attribs'] ?? '';
			$context['attribs'] = $attribs.' disabled';
		}
		$extensions = $context['extensions'] ?? '';
		if ($extensions) {
			if (is_string($extensions)) {
				$extensions = explode(',', $extensions);
			}
			$extensions = array_map( function($extension) {
				return '.'.$extension;
			}, $extensions);

			$attribs = $context['attribs'] ?? '';
			$context['attribs'] = $attribs.' accept="'.implode(',', $extensions).'"';
		}
		return $context;
	}

}