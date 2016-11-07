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
    private $teachers_studentsDatas;
    private $students_homeworksDatas;
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
        $this->teachers_studentsDatas = array();
        $this->students_homeworksDatas = array();
        for ($i = 0; $i < 10; $i++) {
            $this->universityDatas[$i][0] = $faker->company;
            $this->universityDatas[$i][1] = $faker->city;
            $this->universityDatas[$i][2] = $faker->email;
        }
        for ($i = 0; $i < 20; $i++) {
            $this->departmentDatas[$i][0] = $faker->company;
            $this->departmentDatas[$i][1] = $faker->numberBetween($min = 1, $max = 10);
        }
        for ($i = 0; $i < 50; $i++) {
            $this->studentDatas[$i][0] = $faker->firstName;
            $this->studentDatas[$i][1] = $faker->lastName;
            $this->studentDatas[$i][2] = $faker->numberBetween($min = 1, $max = 10);
            $this->studentDatas[$i][3] = $faker->email;
            $this->studentDatas[$i][4] = $faker->phoneNumber;
        }
        for ($i = 0; $i < 10; $i++) {
            $this->teacherDatas[$i][0] = $faker->firstName;
            $this->teacherDatas[$i][1] = $faker->lastName;
            $this->teacherDatas[$i][2] = $faker->numberBetween($min = 1, $max = 20);
        }
        for ($i = 0; $i < 20; $i++) {
            $this->subjectDatas[$i][0] = $faker->word;
            $this->subjectDatas[$i][1] = $faker->numberBetween($min = 1, $max = 20);
        }
        for ($i = 0; $i < 50; $i++) {
            $this->homeworkDatas[$i][0] = $faker->word;
            $this->homeworkDatas[$i][1] = $faker->numberBetween($min = 1, $max = 20);
        }
        for ($i = 0; $i < 50; $i++) {
            $this->teachers_studentsDatas[$i][0] = $faker->numberBetween($min = 1, $max = 10);
            $this->teachers_studentsDatas[$i][1] = $faker->numberBetween($min = 1, $max = 50);
        }

        for ($i = 0; $i < 50; $i++) {
            $this->students_homeworksDatas[$i][0] = $faker->numberBetween($min = 1, $max = 50);
            $this->students_homeworksDatas[$i][1] = $faker->numberBetween($min = 1, $max = 50);
            $this->students_homeworksDatas[$i][2] = true;
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
            $this->mysqli->query("INSERT INTO students (name, surname, univ_id, email, phone_nub)
                    VALUES ('" .$val[0]."','".$val[1]."','".$val[2]."','".$val[3]."','".$val[4]."')");
        }
        foreach ($this->teacherDatas as $key => $val) {
            $this->mysqli->query("INSERT INTO teachers (name, surname, depatment) 
                    VALUES ('" .$val[0]."','".$val[1]."','".$val[2]."')");
        }
        foreach ($this->subjectDatas as $key => $val) {
            $this->mysqli->query("INSERT INTO subjects (name, depatment) 
                    VALUES ('" .$val[0]."','".$val[1]."')");
        }
        foreach ($this->homeworkDatas as $key => $val) {
            $this->mysqli->query("INSERT INTO homeworks (name, subject) 
                    VALUES ('" .$val[0]."','".$val[1]."')");
        }
        foreach ($this->teachers_studentsDatas as $key => $val) {
            $this->mysqli->query("INSERT INTO teachers_students (teachers, students) 
                    VALUES ('" .$val[0]."','".$val[1]."')");
        }
        foreach ($this->students_homeworksDatas as $key => $val) {
            $this->mysqli->query("INSERT INTO students_homeworks (students, homeworks, pass) 
                    VALUES ('" .$val[0]."','".$val[1]."')");
        }
        $this->mysqli->close();
    }
}
