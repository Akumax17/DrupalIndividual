<?php

namespace Drupal\hexa_gen\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

//https://www.drupal.org/docs/8/creating-custom-modules/creating-custom-blocks/create-a-custom-block

/**
 * Bloque de información
 *
 * @Block(
 *   id = "information_block",
 *   admin_label = @Translation("Bloque de informacion del color hexadecimal"),
 * )
 */
class InformationBlock extends BlockBase implements ContainerFactoryPluginInterface
{

	/**
	 * @var AccountProxyInterface
	 */
	protected $current_user;

	/**
	 *@var ConfigFactory
	 */
	protected $config_factory;

	public function __construct(
		array $configuration,
		$plugin_id,
		$plugin_definition,
		AccountProxyInterface $current_user,
		ConfigFactory $config_factory
	) {
		parent::__construct($configuration, $plugin_id, $plugin_definition);

		$this->config_factory = $config_factory;
	}

	/**
	 * @param ContainerInterface $container
	 * @param array $configuration
	 * @param string $plugin_id
	 * @param mixed $plugin_definition
	 * @return static
	 */
	public static function create(
		ContainerInterface $container,
		array $configuration,
		$plugin_id,
		$plugin_definition
	) {

		// config.factory
		// https://api.drupal.org/api/drupal/core%21lib%21Drupal%21Core%21Config%21ConfigFactory.php/class/ConfigFactory/

		// current_user
		// https://api.drupal.org/api/drupal/core%21core.services.yml/service/current_user/8.8.x
		return new static(
			$configuration,
			$plugin_id,
			$plugin_definition,
			$container->get('config.factory')
		);
	}

	public function build()
	{
		$build = [];

		$config = $this->config_factory->get('hexa_gen.configuration');

		// $color = $config->get('color_favorito');

		$build['information_block'] = [
			'#markup' => $this->t("El código de color es: @color", [
				'@color' => $config->get('hexa_gen')
			]),
		];

		return $build;
	}
}