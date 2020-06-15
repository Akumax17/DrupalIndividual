<?php

namespace Drupal\colorhexa\Controller;

use Drupal\Component\Utility\Html;

class ColorhexaController
{
	public function generate($color)
	{
		// Default settings.
		$config = \Drupal::config('colorhexa.settings');
		// Page title and source text.
		$page_title = $config->get('colorhexa.page_title');
		//$source_color = $config->get('colorhexa.color');

		// Then we break down the phrases from $source_text into a single array:
		//$repertory = explode(PHP_EOL, $source_text);

		//$element['#source_text'] = [];

		//quitar vvvvv
		$hexa = '#'+$color;

		/*	//$element['#source_text'] = SafeMarkup::checkPlain($source_text);
			$element['#source_color'] = Html::escape($source_color);

			//$element['#hxa'] = SafeMarkup::checkPlain($hxa);
			$element['#hexa'] = Html::escape($hexa);

			//$element['#title'] = SafeMarkup::checkPlain($page_title);
			$element['#title'] = Html::escape($page_title);

			// Theme function.
			$element['#theme'] = 'colorhexa';

			return $element;


		return [
      
      '#theme' => 'colorhexa',
      '#title' => $this->t($page_title),
      '#color' => $this->t($hexa),
    ];
*/


    return [
      '#theme' => 'colorhexa',
      '#title' => $page_title,
      '#color' => $hexa,
    ];


 /*   return array(
      //Your theme hook name
      '#theme' => 'colorhexa',      
      //Your variables
      '#title' => $page_title,
      '#color' => $hexa,
    );
*/


		}

		
/*
		public function index()
	{
		// TODO: Pasar parametros
		return [
			'#theme' => 'colorhexa',
			'#title' => $config->get('colorhexa.page_title'),
			'#color' => '#555555',
			'#source_text' => $config->get('colorhexa.source_text')
		];
	}

	*/
}