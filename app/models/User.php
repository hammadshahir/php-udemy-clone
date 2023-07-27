<?php
/***
 * Users Model
 */

 class User extends Model
 {
    public $errors = [];
    protected $table = "users";
    protected $allowedColumns = [
       
       'firstName', 
       'lastName', 
       'email', 
       'password', 
       'role', 
       'createDate',
    ];
    public function validate($data)
    {
        $this->errors = [];
        
        if(empty($data['firstName']))
        {
            $this->errors['firstName'] = "First name is required.";
        }

        if(empty($data['lastName']))
        {
            $this->errors['lastName'] = "Last name is required.";
        }

        // Validate and check email
        
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = "Email is invalid.";
        } else if ($this->where(['email'=>$data['email']]))
        {
            $this->errors['email'] = "Email already exists.";
        }

        if(empty($data['password']))
        {
            $this->errors['password'] = "Password field is required.";
        }

        if(empty($data['confirmPassword']))
        {
            $this->errors['confirmPassword'] = "Conmfirm field is required.";
        }

        if($data['password'] !== $data['confirmPassword'])
        {
            $this->errors['password'] = "Passwords do not match.";
        }

        if(empty($data['terms']))
        {
            $this->errors['terms'] = "Please accept the terms and conditions.";
        }

        if(empty($this->errors))
        {
            return true;
        }
        return false;
    } // End of validate
 } // End of User class