<?php
/**
 * Singup class
 */

class Signup extends Controller
{
    public function index()
    {
        //show($_POST);
        $data['errors'] = [];
        $user = new User();
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if($user->validate($_POST))
            {
                $_POST['createDate'] = date("Y-m-d H:i:s");
                $user->insert($_POST);
            }
        }
        

        $data['errors'] = $user->errors;
        
        $data['title'] = 'Singup';
        $this->view('signup', $data);
    }
}