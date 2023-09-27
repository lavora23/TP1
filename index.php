<?php
$host = "localhost";
$db = "tp_1";
$user = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
global $oPDO;
try {
    $oPDO = new PDO($dsn, $user, $password);
    if ($oPDO) {
        echo "Connexion reussie";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    throw $th;
}
require_once "Stud.php";
echo "<br>";
echo "<br>";
echo "<br>";
$ostudent = new student;
var_dump($ostudent);
echo "<br>";
echo "<br>";
echo "<br>";
$students = $ostudent->getStudents();
var_dump($students);
echo "<br>";
echo "<br>";
//var_dump($students[0]);
echo "<br>";
echo "<br>";
$students = $ostudent->getStudentById(0);
var_dump($students);
$astudent_to_insert = [
    'nom' => "le nom de l etudiant ",
    'prenom' => "sasa",
    'anneeN' => 2000
];
$student_added = $ostudent->addstudent($astudent_to_insert);
echo "<br>";
echo "<br>";
var_dump($student_added);
echo "<br>";
var_dump($ostudent->getStudents());
echo "<br>";
$students = new student;
$students = $ostudent->getStudentById(1);
$students["nom"] = "quel est ton nom";
$students["prenom"] = "julio";
$students["anneeN"] = 2000;
//var_dump($Etudiant);
echo "<br>";
//var_dump
$ostudent->updateStudent($students, $students);
var_dump($ostudent->getStudentById(1));
var_dump($ostudent->deleteStudentById(1))




    ?>