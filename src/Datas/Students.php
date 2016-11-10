<?php

namespace Vendor\DataBase\Datas;

class Students
{
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new \mysqli('localhost', 'root', '5L7tMna4rmkpi6Z', 'study');
    }

    public function findAll()
    {
        $values = $this->mysqli->query('SELECT students.stud_name, students.surname, students.email, students.phone_nub, universities.name
                                        FROM departments 
                                        LEFT JOIN universities
                                        ON students.univ_id=universities.id');
        $resultarray = array();
        if (mysqli_num_rows($values) > 0) {
            // output data of each row
            for ($i = 0; $row = mysqli_fetch_assoc($values); ++$i) {
                $resultarray[$i]['name'] = $row['stud_name'];
                $resultarray[$i]['surname'] = $row['surname'];
                $resultarray[$i]['email'] = $row['email'];
                $resultarray[$i]['phone_nub'] = $row['phone_nub'];
                $resultarray[$i]['univ'] = $row['name'];
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
        $studentDatas = array();
        $studentDatas[0] = $faker->firstName;
        $studentDatas[1] = $faker->lastName;
        $studentDatas[2] = $faker->numberBetween($min = 1, $max = 10);
        $studentDatas[3] = $faker->email;
        $studentDatas[4] = $faker->phoneNumber;
        $this->mysqli->query("INSERT INTO students (stud_name, surname, univ_id, email, phone_nub) 
                    VALUES ('" .$studentDatas[0]."','".$studentDatas[1]."','".$studentDatas[2]."','".$studentDatas[3]."','".$studentDatas[4]."')");
        $this->mysqli->close();
    }

    public function find($id)
    {
        $values = $this->mysqli->query("SELECT stud_name, surname, email FROM students WHERE univ_id ='.$id.'");
        $resultarray = array();
        if (mysqli_num_rows($values) > 0) {
            // output data of each row
            for ($i = 0; $row = mysqli_fetch_assoc($values); ++$i) {
                $resultarray[$i]['name'] = $row['stud_name'];
                $resultarray[$i]['surname'] = $row['surname'];
                $resultarray[$i]['email'] = $row['email'];
            }
        } else {
            echo '0 results';
        }

        return $resultarray;
        $this->mysqli->close();
    }

    public function update($email, $name)
    {
        $this->mysqli->query("UPDATE students SET email = '.$email.' 
                    WHERE stud_name = '.$name.'");
        $this->mysqli->close();
    }

    public function remove($id)
    {
        $this->mysqli->query("DELETE FROM students  WHERE id = '.$id.'");
        $this->mysqli->close();
    }

    public function findBy($univ_id)
    {
        $values = $this->mysqli->query("SELECT stud_name, phone_nub FROM students WHERE univ_id ='.$univ_id.' GROUP BY stud_name ");
        $resultarray = array();
        if (mysqli_num_rows($values) > 0) {
            // output data of each row
            for ($i = 0; $row = mysqli_fetch_assoc($values); ++$i) {
                $resultarray[$i]['name'] = $row['stud_name'];
                $resultarray[$i]['phone'] = $row['phone_nub'];
            }
        } else {
            echo '0 results';
        }

        return $resultarray;
        $this->mysqli->close();
    }
}
