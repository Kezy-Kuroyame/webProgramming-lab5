<?php
class MySQL{

    public function addRow(string $login, string $password, string $name, string $surname, string $birthday, string $city){
        $link = mysqli_connect("localhost", "root", "", "users");
        mysqli_query($link, "SET NAMES 'utf8'");
        mysqli_set_charset($link, "utf8");

        $query = "INSERT INTO `users`(`login`, `password`, `name`, `surname`, `birthday`, `city`) VALUES ('".$login."', '".$password."', '".$name."', '".$surname."', '".$birthday."', '".$city."')";
        mysqli_query($link, $query);
        
    }

    public function readRow(string $login = "", int $id = -1){
        $link = mysqli_connect("localhost", "root", "", "users");
        mysqli_query($link, "SET NAMES 'utf8'");

        if ($login != ""){
            $sql = 'SELECT id, login, password FROM users';
            $result = mysqli_query($link, $sql);

            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

            foreach ($rows as $row){
                if ($row['login'] == $login){
                    return $row;
                }
            }
        }
        else if ($id != -1){
            $sql = 'SELECT * FROM users';
            $result = mysqli_query($link, $sql);

            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

            foreach ($rows as $row){
                if ($row['id'] == $id){
                    return $row;
                }
            }
        }
        else{
            return null;
        }
    }

    public function readLast(){
        $link = mysqli_connect("localhost", "root", "", "users");
        mysqli_query($link, "SET NAMES 'utf8'");
     
        $sql = 'SELECT * FROM users';
        $result = mysqli_query($link, $sql);

        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $rows[count($rows) - 1];
    }

    public function hasLogin($login){
        $link = mysqli_connect("localhost", "root", "", "users");
        mysqli_query($link, "SET NAMES 'utf8'");
     
        $sql = 'SELECT login FROM users';
        $result = mysqli_query($link, $sql);

        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($rows as $row) {
            if ($row['login'] == $login) {
                return true;
            }
        }
        return false;
    }

    public function deleteRow($id){
        $link = mysqli_connect("localhost", "root", "", "users");
        mysqli_query($link, "SET NAMES 'utf8'");

        $sql = "DELETE FROM `users` WHERE id=$id";
        mysqli_query($link, $sql);
    }

    public function updateRow($id, string $login, string $password, string $name, string $surname, string $birthday, string $city){
        $link = mysqli_connect("localhost", "root", "", "users");
        mysqli_query($link, "SET NAMES 'utf8'");

        $query = "UPDATE `users` SET `login`='".$login."', `password`='".$password."', `name`='".$name."', `surname`='".$surname."', `birthday`='".$birthday."', `city`='".$city."' WHERE `id`='".$id."'";
        
        // UPDATE `users` SET `id`='[value-1]',`login`='[value-2]',`password`='[value-3]',`name`='[value-4]',`surname`='[value-5]',`birthday`='[value-6]',`city`='[value-7]' WHERE 1
        
        mysqli_query($link, $query);
    }
}

?>