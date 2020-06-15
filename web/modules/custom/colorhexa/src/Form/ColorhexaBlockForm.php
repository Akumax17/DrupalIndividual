<?php

namespace Drupal\colorhexa\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Lorem Ipsum block form
 */
class ColorhexaBlockForm extends FormBase
{

	/**
	 * {@inheritdoc}
	 */
	public function getFormId()
	{
		return 'colorhexa_block_form';
	}

	/**
	 * {@inheritdoc}
	 */
	public function buildForm(array $form, FormStateInterface $form_state)
	{
		

		// Color code
		$form['color'] = [
			'#type' => 'textfield',
			'#title' => $this->t('Color:'),
			'#default_value' => '000000',
			'#description' => $this->t('Select the color of the title'),
		];

		// Submit.
		$form['submit'] = [
			'#type' => 'submit',
			'#value' => $this->t('Ir'),
		];

		return $form;
	}

	/**
	 * {@inheritdoc}
	 */
	public function validateForm(array &$form, FormStateInterface $form_state)
	{
		$color = $form_state->getValue('color');
	/*	if (!is_numeric($color)) {
			$form_state->setErrorByName('phrases', $this->t('Please use a number.'));
		}

		if (floor($color) != $color) {
			$form_state->setErrorByName('phrases', $this->t('No decimals, please.'));
		}


		if ($color < 1 && $) {
			$form_state->setErrorByName('phrases', $this->t('Please use a number greater than zero.'));
		}
		*/
	}

	/**
	 * {@inheritdoc}
	 */
	public function submitForm(array &$form, FormStateInterface $form_state)
	{
		$form_state->setRedirect('colorhexa.generate', [
			'color' => $form_state->getValue('color'),
		]);
	}
}