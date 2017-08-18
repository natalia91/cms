<?php

class Model_register extends Model
{
    /*public function addUser($user)
    {
        if(empty($user))
        {
            return falce;
        }

        $query = "INSERT INTO users (`name`, `email`, `phone`, `password`) VALUES ('$user->name', '$user->email', '$user->phone', '$user->password')";
        $result = $this->query($query);
        if(!$result)
        {
            return $result;
        }
    }*/

    public function addUser($user) {
        if(empty($user))
        {
            return false;
        }

        $query = "INSERT INTO users (`name`,`email`,`phone`)
                        VALUES ('$user->name',
                                '$user->phone',
                                '$user->email')";

        $this->query($query);
        
    }
}