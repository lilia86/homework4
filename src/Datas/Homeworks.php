<?php

namespace Vendor\DataBase\Datas;

class Homeworks
{
    private $mysqli;
    public function __construct()
    {
        $this->mysqli = new \mysqli('localhost', 'root', '5L7tMna4rmkpi6Z', 'study');
    }
    public function findAll()
    {
        $values = $this->mysqli->query('SELECT homeworks.hw_name, subjects.sub_name, students.stud_name, students_homeworks.pass
                                        FROM homeworks 
                                        JOIN subjects ON homeworks.subject=subjects.id
                                        JOIN students_homeworks ON homeworks.id=students_homeworks.homeworks
                                        JOIN students ON students_homeworks.students=students.id
                                        ORDER BY homeworks.hw_name');
        $resultarray = array();
        if (mysqli_num_rows($values) > 0) {
            // output data of each row
            for ($i = 0; $row = mysqli_fetch_assoc($values); ++$i) {
                $resultarray[$i]['homework'] = $row['hw_name'];
                $resultarray[$i]['subject'] = $row['sub_name'];
                $resultarray[$i]['student'] = $row['stud_name'];
                $resultarray[$i]['pass'] = $row['pass'];
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
        $homeworkDatas = array();
        $homeworkDatas[0] = $faker->word;
        $homeworkDatas[1] = $faker->numberBetween($min = 1, $max = 20);
        $this->mysqli->query("INSERT INTO homeworks (hw_name, subject) 
                    VALUES ('" .$homeworkDatas[0]."','".$homeworkDatas[1]."')");
        $this->mysqli->close();
    }
    public function find($id)
    {
        $values = $this->mysqli->query("SELECT * FROM homeworks WHERE id ='.$id.'");
        $resultarray = array();
        if (mysqli_num_rows($values) > 0) {
            // output data of each row
            for ($i = 0; $row = mysqli_fetch_assoc($values); ++$i) {
                $resultarray[$i]['name'] = $row['name'];
            }
        } else {
            echo '0 results';
        }

        return $resultarray;
        $this->mysqli->close();
    }
    public function update(array $sub_id, $name)
    {
        $this->mysqli->query("UPDATE homeworks SET subject = '.$sub_id.' 
                    WHERE name = '.$name.'");
        $this->mysqli->close();
    }
    public function remove($id)
    {
        $this->mysqli->query("DELETE FROM homeworks  WHERE id = '.$id.'");
        $this->mysqli->close();
    }

    public function findBy($subject)
    {
        $values = $this->mysqli->query("SELECT hw_name FROM homeworks WHERE subject ='.$subject.'");
        $resultarray = array();
        if (mysqli_num_rows($values) > 0) {
            // output data of each row
            for ($i = 0; $row = mysqli_fetch_assoc($values); ++$i) {
                $resultarray[$i]['hw_name'] = $row['hw_name'];
            }
        } else {
            echo '0 results';
        }

        return $resultarray;
        $this->mysqli->close();
    }
}
