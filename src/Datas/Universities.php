<?php

namespace Vendor\DataBase\Datas;

class Universities
{
    private $mysqli;
    public function __construct()
    {
        $this->mysqli = new \mysqli('localhost', 'root', '5L7tMna4rmkpi6Z', 'study');
    }
    public function findAll()
    {
        $values = $this->mysqli->query('SELECT * FROM universities');
        $resultarray = array();
        if (mysqli_num_rows($values) > 0) {
            // output data of each row
            for ($i = 0; $row = mysqli_fetch_assoc($values); ++$i) {
                $resultarray[$i]['name'] = $row['name'];
                $resultarray[$i]['town'] = $row['town'];
                $resultarray[$i]['email'] = $row['email'];
            }
        } else {
            echo '0 results';
        }

        return $resultarray;
        $this->mysqli->close();
    }

    public function insert(array $univ_data)
    {
        foreach ($univ_data as $key => $val) {
            $this->mysqli->query("INSERT INTO universities (name, town, email) 
                    VALUES ('" .$val[0]."','".$val[1]."','".$val[2]."')");
        }
    }
    public function find($id)
    {
        $values = $this->mysqli->query("SELECT * FROM universities WHERE id ='.$id.'");
        $resultarray = array();
        if (mysqli_num_rows($values) > 0) {
            // output data of each row
            for ($i = 0; $row = mysqli_fetch_assoc($values); ++$i) {
                $resultarray[$i]['name'] = $row['name'];
                $resultarray[$i]['town'] = $row['town'];
                $resultarray[$i]['email'] = $row['email'];
            }
        } else {
            echo '0 results';
        }

        return $resultarray;
    }
    public function update(array $univ_data, $name)
    {
        $this->mysqli->query("UPDATE universities SET town = '.$univ_data[0].', email = '.$univ_data[1].' 
                    WHERE name = '.$name.'");
    }
    public function remove($id)
    {
        $this->mysqli->query("DELETE FROM universities  WHERE id = '.$id.'");
    }

    public function findBy($criteria = [])
    {
        $this->mysqli->query("findBy({name: 'Garvard'}, function (err, rows))");
    }
}
