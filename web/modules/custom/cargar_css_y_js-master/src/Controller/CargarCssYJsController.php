<?php

namespace Drupal\cargar_css_y_js\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class CargarCssYJsController.
 */
class CargarCssYJsController extends ControllerBase
{

	/**
	 * Index.
	 *
	 * @return string
	 */
	public function index()
	{

		$items = [
			[
				'title' => $this->t('Title 1'),
				'description' => $this->t('Bacon ipsum dolor amet doner pig ham hock jowl pork loin. Beef pig rump brisket, t-bone buffalo chicken landjaeger salami shoulder. Sirloin pork belly shank bacon prosciutto beef ribs short loin kielbasa andouille chislic sausage pastrami turkey. Pork biltong burgdoggen sausage drumstick. Rump alcatra tail, pig picanha chuck landjaeger doner jowl ball tip bacon strip steak prosciutto frankfurter tri-tip.'),
			],
			[
				'title' => $this->t('Title 2'),
				'description' => $this->t('Bacon ipsum dolor amet doner pig ham hock jowl pork loin. Beef pig rump brisket, t-bone buffalo chicken landjaeger salami shoulder. Sirloin pork belly shank bacon prosciutto beef ribs short loin kielbasa andouille chislic sausage pastrami turkey. Pork biltong burgdoggen sausage drumstick. Rump alcatra tail, pig picanha chuck landjaeger doner jowl ball tip bacon strip steak prosciutto frankfurter tri-tip.'),
			],
			[
				'title' => $this->t('Title 3'),
				'description' => $this->t('Bacon ipsum dolor amet doner pig ham hock jowl pork loin. Beef pig rump brisket, t-bone buffalo chicken landjaeger salami shoulder. Sirloin pork belly shank bacon prosciutto beef ribs short loin kielbasa andouille chislic sausage pastrami turkey. Pork biltong burgdoggen sausage drumstick. Rump alcatra tail, pig picanha chuck landjaeger doner jowl ball tip bacon strip steak prosciutto frankfurter tri-tip.'),
			],
			[
				'title' => $this->t('Title 4'),
				'description' => $this->t('Bacon ipsum dolor amet doner pig ham hock jowl pork loin. Beef pig rump brisket, t-bone buffalo chicken landjaeger salami shoulder. Sirloin pork belly shank bacon prosciutto beef ribs short loin kielbasa andouille chislic sausage pastrami turkey. Pork biltong burgdoggen sausage drumstick. Rump alcatra tail, pig picanha chuck landjaeger doner jowl ball tip bacon strip steak prosciutto frankfurter tri-tip.'),
			],
		];

		/*

			<div class="container">

				[items]

			</div>


		*/

		$build = [
			'#prefix' => '<div class="container">',
			'#suffix' => '</div>',
			'items' => [],
			'#attached' => [
				'library' => [
					'cargar_css_y_js/css_y_js_del_modulo',
					'cargar_css_y_js/axios',
					'cargar_css_y_js/fontawesome',
				]
			]
		];

		foreach ($items as $item) {
			$build['items'][] = [
				'#theme' => 'item_accordion',
				'#title' => $item['title'],
				'#description' => $item['description'],
			];
		}

		return $build;
	}
}
