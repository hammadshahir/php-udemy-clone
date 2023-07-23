<?php

class Database
{
    // Database connection with PDO
    private function connect()
    {
        $str = DBDRIVER.":hostname=".DBNAME.";dbname=".DBNAME;
        $con = new PDO($str, DBUSER, DBPASS);

        return $con;
    }

    public function query($query, $data = [], $type = 'object')
    {
        $con = $this->connect();
        $stm = $con->prepare($query);
        if($stm)
        {
            $check = $stm->execute($data);
            if($check)
            {
                if($type == 'object')
                {
                    $type = PDO::FETCH_OBJ;
                } else {
                    $type = PDO::FETCH_ASSOC;
                }
                $result = $stm->fetchAll($type);
                if(is_array($result) && count($result) > 0)
                {
                    return $result;
                }
            }
        }

        return false;
    }

    public function create_tables()
    {
        $query = "
            CREATE TABLE IF NOT EXISTS `users` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `email` varchar(100) NOT NULL,
            `password` varchar(255) NOT NULL,
            `create_date` date DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `email` (`email`),
            KEY `create_date` (`create_date`)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        ";
        $this->query($query);
    }
} // End of class Database