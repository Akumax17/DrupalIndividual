<?php

namespace Drupal\colorhexa\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ColorhexaForm extends ConfigFormBase
{

	/**
	 * {@inheritdoc}
	 */
	public function getFormId()
	{
		return 'colorhexa_form';
	}

	/**
	 * {@inheritdoc}
	 */
	public function buildForm(array $form, FormStateInterface $form_state)
	{
		// Form constructor.
		$form = parent::buildForm($form, $form_state);
		// Default settings.
		$config = $this->config('colorhexa.settings');

		// Page title field.
		$form['page_title'] = array(
			'#type' => 'textfield',
			'#title' => $this->t('Hexa color page title:'),
			'#default_value' => $config->get('colorhexa.page_title'),
			'#description' => $this->t('Color hexa page title.'),
		);

		// Page title field.
		$form['color'] = array(
			'#type' => 'textfield',
			'#title' => $this->t('Hexadecimal color code:'),
			'#default_value' => $config->get('colorhexa.color'),
			'#description' => $this->t('Hexa color code: Ex: 000000 (Without #)'),
		);

		return $form;
	}

	/**
	 * {@inheritdoc}
	 */
	public function validateForm(array &$form, FormStateInterface $form_state)
	{
		$code = $form_state->getValue('color');

		if (strlen($code) != 4 && strlen($code) != 7){
			$form_state->setErrorByName('color', $this->t('Por favor dígite 4 o 7 dígitos'));
		}
		

		if ($code[1] != '#'){
			$form_state->setErrorByName('color', $this->t('Por favor inicie con #'));	
		}

		if (strlen($code) == 4){

			$nuevoHexa[0] = $code[0];
			$nuevoHexa[1] = $code[1];
			$nuevoHexa[2] = $code[1];
			$nuevoHexa[3] = $code[2];
			$nuevoHexa[4] = $code[2];
			$nuevoHexa[5] = $code[3];
			$nuevoHexa[6] = $code[3];

			$form_state->setErrorByName('color', $this->t('Habrás querido decir:'+$nuevoHexa+'?'));
		}

	}

	/**
	 * {@inheritdoc}
	 */
	public function submitForm(array &$form, FormStateInterface $form_state)
	{
		$config = $this->config('colorhexa.settings');
		$config->set('colorhexa.color', $form_state->getValue('color'));
		$config->set('colorhexa.page_title', $form_state->getValue('page_title'));
		$config->save();
		return parent::submitForm($form, $form_state);
	}

	/**
	 * {@inheritdoc}
	 */
	protected function getEditableConfigNames()
	{
		return [
			'colorhexa.settings',
		];
	}
}