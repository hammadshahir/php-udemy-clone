<?php
/***
 * Users Model
 */

 class User
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


        if(empty($data['email']))
        {
            $this->errors['email'] = "Email is invalid or empty.";
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

    public function insert($data)
    {
        // Remove unwanted columns
        if(!empty($this->allowedColumns))
        {
            foreach ($data as $key => $value)
            {
                if(!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        $values = array_values($data);

        $query = "insert into users ";
        $query .= "(".implode(",", $keys).") values (:".implode(",:", $keys).")";

        $db = new Database();
        $db->query($query, $data);
        
    } // End of insert
 } // End of User class