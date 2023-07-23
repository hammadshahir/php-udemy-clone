<?php
/**
 * 
 * Main controller class
 * 
 */
class Controller
{
    // This method will look for view file and load it.
    public function view($view, $data = [])
    {
        $fileName = "../app/views/".$view.".view.php";
        if(file_exists($fileName))
        {
            require $fileName;
        } else {
            echo "Could not find view file: ".$fileName; 
        }
    } // End of function view
} // End of class Controller