<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $name;
    public $email;
	public $body;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
            array('name', 'required' , 'message'=>'O nome é obrigatório'),
            array('email', 'required' , 'message'=>'O e-mail é obrigatório'),
			array('body', 'required', 'message'=>'A mensagem é obrigatória'),
			// email has to be a valid email address
			array('email', 'email', 'message'=>'O e-mail inserido não é válido'),
		);
	}


}