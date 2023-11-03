<?php 

/**
 * users model
 */
class User extends Model
{
	
	public $errors = [];
	protected $table = "users";

	protected $allowedColumns = [

		'email',
		'firstName',
		'lastName',
		'password',
		'role',
		'createDate', //Only in PHP8 and above we can put comma (,)
	];

	public function validate($data)
	{
		$this->errors = [];

		if(empty($data['firstName']))
		{
			$this->errors['firstName'] = "A first name is required";
		}

		if(empty($data['lastName']))
		{
			$this->errors['lastName'] = "A last name is required";
		}

		//check email
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
		{
			$this->errors['email'] = "Email is not valid";
		}else
		if($this->where(['email'=>$data['email']]))
		{
			$this->errors['email'] = "That email already exists";
		}

		if(empty($data['password']))
		{
			$this->errors['password'] = "A password is required";
		}

		if($data['password'] !== $data['confirmPassword'])
		{
			$this->errors['password'] = "Passwords do not match";
		}

		if(empty($data['terms']))
		{
			$this->errors['terms'] = "Please accept the terms and conditions";
		}		
		
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}

	public function insert ($data)
	{
		//remove unwanted columns
		if(!empty($this->allowedColumns))
		{
			foreach($data as $key => $value) {
				if(!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}	
		}
		//show($data);
		$keys = array_keys($data);
		$values = array_values($data);
		
		$query = "INSERT INTO users ";
		$query .= "(".implode(",", $keys).") VALUES (:".implode(",:", $keys).")";
		
		$db = new Database();
		$db->query($query, $data);	
	} // End of insert method
	
} // End of user class