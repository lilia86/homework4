<?php

namespace Vendor\DataBase\Datas;

class Departments
{
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new \mysqli('localhost', 'root', '5L7tMna4rmkpi6Z', 'study');
    }

    public function findAll()
    {
        $values = $this->mysqli->query('SELECT departments.dep_name, universities.name
                                        FROM departments
                                        LEFT JOIN universities
                                        ON departments.univ_id=universities.id
                                        ORDER BY departments.id;');
        $resultarray = array();
        if (mysqli_num_rows($values) > 0) {
            // output data of each row
            for ($i = 0; $row = mysqli_fetch_assoc($values); ++$i) {
                $resultarray[$i]['department'] = $row['dep_name'];
                $resultarray[$i]['university'] = $row['name'];
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
        $departmentDatas = array();
        $departmentDatas[0] = $faker->company;
        $departmentDatas[1] = $faker->numberBetween($min = 1, $max = 10);
        $this->mysqli->query("INSERT INTO departments (name, univ_id) 
                    VALUES ('" .$departmentDatas[0]."','".$departmentDatas[1]."')");
        $this->mysqli->close();
    }

    public function find($id)
    {
        $values = $this->mysqli->query("SELECT departments.dep_name, universities.name
                                        FROM departments 
                                        LEFT JOIN universities
                                        ON departments.univ_id=universities.id WHERE departments.id = '.$id.';");
        $resultarray = array();
        if (mysqli_num_rows($values) > 0) {
            // output data of each row
            for ($i = 0; $row = mysqli_fetch_assoc($values); ++$i) {
                $resultarray[$i]['dep_name'] = $row['dep_name'];
                $resultarray[$i]['town'] = $row['town'];
            }
        } else {
            echo '0 results';
        }

        return $resultarray;
        $this->mysqli->close();
    }

    public function update($univ_data, $id)
    {
        $this->mysqli->query("UPDATE universities SET university = '.$univ_data.' 
                    WHERE id = '.$id.'");
        $this->mysqli->close();
    }

    public function remove($id)
    {
        $this->mysqli->query("DELETE FROM departments  WHERE id = '.$id.'");
        $this->mysqli->close();
    }

    public function findBy($univ)
    {
        $values = $this->mysqli->query("SELECT * FROM departments WHERE university ='.$univ.'");

        $resultarray = array();
        if (mysqli_num_rows($values) > 0) {
            // output data of each row
            for ($i = 0; $row = mysqli_fetch_assoc($values); ++$i) {
                $resultarray[$i]['name'] = $row['dep_name'];
            }
        } else {
            echo '0 results';
        }

        return $resultarray;
    }
}
