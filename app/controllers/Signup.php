<?php 

/**
 * Signup class
 */
class Signup extends Controller
{
	public function index()
	{
		$data['errors'] = [];

		$user = new User();

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{

			show($_POST);
			if($user->validate($_POST))
			{
                $_POST['role'] = 'user';
                $_POST['createDate'] = date("Y-m-d H:i:s");
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

				$user->insert($_POST);
			
				message("Your profile was successfuly created. Please login");
				redirect('login');
			}
		}

		$data['errors'] = $user->errors;
		$data['title'] = "Signup";
		
		// show($_POST);
		$this->view('signup',$data);
		
	}
}