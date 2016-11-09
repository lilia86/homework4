<?php

namespace Vendor\DataBase\Datas;

class Creator
{
    private $mysqli;
    private $universityTable = 'CREATE TABLE universities (
    id INT(6) UNSIGNED AUTO_INCREMENT, 
    name VARCHAR(30) NOT NULL,
    town VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    PRIMARY KEY(id)    
    ) ENGINE=InnoDB CHARACTER SET=UTF8;';

    private $departmentTable = 'CREATE TABLE departments (
    id INT(6) UNSIGNED AUTO_INCREMENT, 
    dep_name VARCHAR(30) NOT NULL, 
    univ_id INT(6) UNSIGNED, 
    PRIMARY KEY(id),
    FOREIGN KEY (univ_id) REFERENCES universities(id)    
    ) ENGINE=InnoDB CHARACTER SET=UTF8;';

    private $studentTable = 'CREATE TABLE students (
    id INT(6) UNSIGNED AUTO_INCREMENT, 
    name VARCHAR(30) NOT NULL,
    surname VARCHAR(30),
    univ_id INT(6) UNSIGNED,
    email VARCHAR(50), 
    phone_nub VARCHAR(30),
    PRIMARY KEY(id),
    FOREIGN KEY (univ_id) REFERENCES universities(id)
    ) ENGINE=InnoDB CHARACTER SET=UTF8;';

    private $teacherTable = 'CREATE TABLE teachers (
    id INT(6) UNSIGNED AUTO_INCREMENT, 
    name VARCHAR(30) NOT NULL,
    surname VARCHAR(30) NOT NULL,
    depatment INT(6) UNSIGNED,
    PRIMARY KEY(id),
    FOREIGN KEY (depatment) REFERENCES departments(id)    
    ) ENGINE=InnoDB CHARACTER SET=UTF8;';

    private $subjectTable = 'CREATE TABLE subjects (
    id INT(6) UNSIGNED AUTO_INCREMENT, 
    name VARCHAR(30) NOT NULL,
    depatment INT(6) UNSIGNED,
    PRIMARY KEY(id),
    FOREIGN KEY (depatment) REFERENCES departments(id)    
    ) ENGINE=InnoDB CHARACTER SET=UTF8;';

    private $homeworkTable = 'CREATE TABLE homeworks (
    id INT(6) UNSIGNED AUTO_INCREMENT, 
    name VARCHAR(30) NOT NULL,
    subject INT(6) UNSIGNED,
    PRIMARY KEY(id),
    FOREIGN KEY (subject) REFERENCES subjects(id)    
    ) ENGINE=InnoDB CHARACTER SET=UTF8;';

    private $teachers_studentsTable = 'CREATE TABLE teachers_students (
    id INT(6) UNSIGNED AUTO_INCREMENT, 
    teachers INT(6) UNSIGNED,
    students INT(6) UNSIGNED,
    PRIMARY KEY(id),
    FOREIGN KEY (teachers) REFERENCES teachers(id),
    FOREIGN KEY (students) REFERENCES students(id)    
    ) ENGINE=InnoDB CHARACTER SET=UTF8;';

    private $students_homeworksTable = 'CREATE TABLE students_homeworks (
    id INT(6) UNSIGNED AUTO_INCREMENT, 
    students INT(6) UNSIGNED,
    homeworks INT(6) UNSIGNED,
    pass BOOL,
    PRIMARY KEY(id),
    FOREIGN KEY (students) REFERENCES students(id),
    FOREIGN KEY (homeworks) REFERENCES homeworks(id)    
    ) ENGINE=InnoDB CHARACTER SET=UTF8;';

    public function __construct()
    {
        $this->mysqli = new \mysqli('localhost', 'root', '5L7tMna4rmkpi6Z', 'study');
    }

    public function createDataStructure()
    {
        $this->mysqli->query($this->universityTable);
        $this->mysqli->query($this->departmentTable);
        $this->mysqli->query($this->studentTable);
        $this->mysqli->query($this->teacherTable);
        $this->mysqli->query($this->subjectTable);
        $this->mysqli->query($this->homeworkTable);
        $this->mysqli->query($this->teachers_studentsTable);
        $this->mysqli->query($this->students_homeworksTable);
        $this->mysqli->close();
    }
}
