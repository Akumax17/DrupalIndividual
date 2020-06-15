<?php

namespace Drupal\colorhexa\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a Lorem ipsum block with which you can generate dummy text anywhere.
 *
 * @Block(
 *   id = "colorhexa_block",
 *   admin_label = @Translation("Color Hexa block"),
 * )
 */
class ColorhexaBlock extends BlockBase
{

	/**
	 * {@inheritdoc}
	 */
	public function build()
	{
		return \Drupal::formBuilder()->getForm('Drupal\colorhexa\Form\ColorhexaBlockForm');
	}

	/**
	 * {@inheritdoc}
	 */
	public function blockAccess(AccountInterface $account)
	{
		return AccessResult::allowedIfHasPermission($account, 'generate hexa color');
	}

	/**
	 * {@inheritdoc}
	 */
	public function blockForm($form, FormStateInterface $form_state)
	{
		$form = parent::blockForm($form, $form_state);

		$config = $this->getConfiguration();

		return $form;
	}

	/**
	 * {@inheritdoc}
	 */
	public function blockSubmit($form, FormStateInterface $form_state)
	{
		$this->setConfigurationValue('colorhexa_block_settings', $form_state->getValue('colorhexa_block_settings'));
	}
}