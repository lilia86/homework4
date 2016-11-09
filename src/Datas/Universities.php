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

    public function insert()
    {
        $faker = \Faker\Factory::create();
        $universityDatas = array();
        $universityDatas[0] = $faker->company;
        $universityDatas[1] = $faker->city;
        $universityDatas[2] = $faker->email;
        $this->mysqli->query("INSERT INTO universities (name, town, email) 
                    VALUES ('" .$universityDatas[0]."','".$universityDatas[1]."','".$universityDatas[2]."')");
        $this->mysqli->close();
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
        $this->mysqli->close();
    }
    public function update(array $univ_data, $name)
    {
        $this->mysqli->query("UPDATE universities SET town = '.$univ_data[0].', email = '.$univ_data[1].' 
                    WHERE name = '.$name.'");
        $this->mysqli->close();
    }
    public function remove($id)
    {
        $this->mysqli->query("DELETE FROM universities  WHERE id = '.$id.'");
        $this->mysqli->close();
    }

    public function findBy($town)
    {
        $values = $this->mysqli->query("SELECT * FROM universities WHERE town ='.$town.' AND email = NULL");
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
}
