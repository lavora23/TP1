<?php
class student
{
    public function getStudents()
    {

        global $oPDO;
        $oPDOStatement = $oPDO->query("Select id,nom,prenom ,anneeN from etudiant order by id ASC");
        $students = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
        return $students;
    }
    public function getStudentById($id)
    {
        global $oPDO;
        $oPDOStatement = $oPDO->prepare("Select id,nom,prenom,anneeN from etudiant where id = :id");
        $oPDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
        $oPDOStatement->execute();
        $student = $oPDOStatement->fetch(PDO::FETCH_ASSOC);
        return $student;
    }
    public function addStudent($student)
    {
        global $oPDO;
        //preparation de la requette
        $oPDOStatement = $oPDO->prepare("INSERT INTO etudiant SET nom=:nom, prenom=:prenom,anneeN=:anneeN");
        $oPDOStatement->bindParam(':nom', $student['nom'], PDO::PARAM_STR);
        $oPDOStatement->bindParam(':prenom,', $student['prenom'], PDO::PARAM_STR);
        $oPDOStatement->bindParam(':anneeN', $student['anneeN'], PDO::PARAM_INT);
        //executer la requette preparee
       // $oPDOStatement->execute();
        //tester le nombre de ligne affectee
        if ($oPDOStatement->rowCount() <= 0) {
            return false;
        }
        return $oPDO->lastInsertId();
    }
    public function updateStudent($id, $data)
    {
        $students = $this->getStudentById($id);
        if ($students) {
            global $oPDO;
            $oPDOStatement = $oPDO->prepare("UPDATE etudiant SET nom=:nom, prenom=:prenom,anneeN=:anneeN WHERE id=:id");
            $oPDOStatement->bindParam(':nom', $data['nom'], PDO::PARAM_STR);
            $oPDOStatement->bindParam(':prenom', $data['prenom'], PDO::PARAM_STR);
            $oPDOStatement->bindParam(':anneeN', $data['anneeN'], PDO::PARAM_INT);
            $oPDOStatement->bindParam(':id', $data['id'], PDO::PARAM_INT);
            //executer la requette preparee
            $oPDOStatement->execute();
            //tester le nombre de ligne affectee
            $students = $oPDOStatement->fetch(PDO::FETCH_ASSOC);
            return $students;
        }
    }

    public function deleteStudentById($id)
    {
        $students = $this->getStudentById($id);
        if ($students) {
            global $oPDO;
            $oPDOStatement = $oPDO->prepare("DELETE FROM Etudiant WHERE id=:id");
            $oPDOStatement->bindParam(':id', $data['id'], PDO::PARAM_INT);
            //executer la requette preparee
            $result = $oPDOStatement->execute();
            //tester le nombre de ligne affectee

            return "student " . $students[$id] . " supprimer";
        } else {
            return "etudiant introuvable";
        }
    }
}






?>