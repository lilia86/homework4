<?php

namespace Vendor\DataBase\Datas;

require_once '/home/lilia/PhpstormProjects/homework4/vendor/autoload.php';

class Filler
{
    private $mysqli;
    private $universityDatas;
    private $departmentDatas;
    private $studentDatas;
    private $teacherDatas;
    private $subjectDatas;
    private $homeworkDatas;
    public function __construct()
    {
        $this->mysqli = new \mysqli('localhost', 'root', '5L7tMna4rmkpi6Z', 'study');
        $faker = \Faker\Factory::create();
        $this->universityDatas = array();
        $this->departmentDatas = array();
        $this->studentDatas = array();
        $this->teacherDatas = array();
        $this->subjectDatas = array();
        $this->homeworkDatas = array();
        for ($i = 0; $i < 10; ++$i) {
            $this->universityDatas[$i][0] = $faker->company;
            $this->universityDatas[$i][1] = $faker->city;
            $this->universityDatas[$i][2] = $faker->email;
        }
        for ($i = 0; $i < 20; ++$i) {
            $this->departmentDatas[$i][0] = $faker->company;
            $this->departmentDatas[$i][1] = $faker->numberBetween($min = 1, $max = 10);
        }
        for ($i = 0; $i < 50; ++$i) {
            $this->studentDatas[$i][0] = $faker->firstName;
            $this->studentDatas[$i][1] = $faker->lastName;
            $this->studentDatas[$i][2] = $faker->numberBetween($min = 1, $max = 10);
            $this->studentDatas[$i][3] = $faker->email;
            $this->studentDatas[$i][4] = $faker->phoneNumber;
        }
    }

    public function insertValues()
    {
        foreach ($this->universityDatas as $key => $val) {
            $this->mysqli->query("INSERT INTO universities (name, town, email) 
                    VALUES ('" .$val[0]."','".$val[1]."','".$val[2]."')");
        }
        foreach ($this->departmentDatas as $key => $val) {
            $this->mysqli->query("INSERT INTO departments (name, univ_id) 
                    VALUES ('" .$val[0]."','".$val[1]."')");
        }
        foreach ($this->studentDatas as $key => $val) {
            $this->mysqli->query("INSERT INTO students (name, surname, univ_id, email, phone_num*/) 
                    VALUES ('" .$val[0]."','".$val[1]."','".$val[2]."','".$val[3]."','".$val[4]."')");
        }
        $this->mysqli->close();
    }
}
