<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

  public $register = [
    'nama' => 'required|min_length[6]',
    'password' => 'required|min_length[8]',
    'kabupaten' => 'required|min_length[3]|alpha_space',
    'provinsi' => 'required|min_length[3]|alpha_space',
    'kecamatan' => 'required|min_length[3]|alpha_space',
    'no_hp' => 'required|min_length[3]|numeric',
    'alamat' => 'required|min_length[8]',
    'password1' => 'required|matches[password]',
    'email'        => 'required|valid_email|is_unique[users.user_email]'
	];

  public $login = [
    'email' => 'required',
    'password' => 'required'
	];
	
}
