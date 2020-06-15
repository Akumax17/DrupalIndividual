<?php 

namespace Drupal\hexa_gen\Controller;

class HexaGenController
{

	public function index (){

// TODO: Mostrar el color favorito acá
		
		return [
			'#theme' => 'hexa_gen',
			'#title' => 'Muestre el color en hexa',
			'#color' => '#555555'
		];

	}

}