<?php

use Drupal\Core\Routing\RouteMatchInterface;


/**
 * Implements hook_theme().
 */
function colorhexa_theme($existing, $type, $theme, $path)
{
	$variables = array(
		'colorhexa' => array(
			'variables' => array(
				'title' => '',
				'color' => '',
			),
			'template' => 'colorhexa',
		),
	);
	return $variables;
}

/*
function colorhexa_theme($existing, $type, $theme, $path)
{
	return [
		'colorhexa' => [
			'variables' => [
				'title' => '',
				'color' => '',
			],
			'template' => 'colorhexa'
		]
	];
}*/