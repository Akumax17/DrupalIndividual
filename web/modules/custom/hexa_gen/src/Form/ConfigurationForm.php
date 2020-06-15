<?php 


namespace Druapl\hexa_gen\Form;

class ConfigurationForm extends ConfigFormBase
{
	/**
	* {@inheritdoc}
	*/
	public function getFormId(){

		return 'hexa_gen.configuration_form';
	}

	/**
	* {@inheritdoc}
	*/
	public function buildForm(array $form, FormStateInterface $form_state){
		
		$form = parent::buildForm($form, $form_state)

		$config = $this->config('hexa_gen.configuration');
	
		$form['hexa_gen'] = [
			'#type' => 'textfield'
			'#title' => $this->t('Ingrese el código hexadecimal'),
			'#default_value' => $config->get('hexa_gen_default'),
			'#size' => 20,
			'#maxlength' => 7
		];

		return $form;
	}

	/**
	* {@inheritdoc}
	*/
	public function validateForm(array &$form, FormStateInterface $form_state) {

	}

	/**
	* {@inheritdoc}
	*/
	public function submitForm(array &$form, FormStateInterface $form_state){

		$this->config('hexa_gen.configuration')
		->set(hexa_gen, $form_state->getValue('hexa_gen_default'));
		->save();

		return parent::submitForm($form, $form_state);
	}

	/**
	* {@inheritdoc}
	*/
	public function getEditableConfigNames(){

		return [
			'hexa_gen.configuration'
		];

	}

}