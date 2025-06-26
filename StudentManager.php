<?php
require_once 'db_connect.php';

class StudentManager
{
    private $db;

    public function __construct($mysqli)
    {
        $this->db = $mysqli;
    }

    public function addStudent($name, $email, $gender, $course)
    {
        $stmt = $this->db->prepare('INSERT INTO student (name, email, gender, course) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssss', $name, $email, $gender, $course);
        return $stmt->execute();
    }

    public function getAllStudents()
    {
        $result = $this->db->query('SELECT * FROM student');
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getStudentById($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM student WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateStudent($id, $name, $email, $gender, $course)
    {
        $stmt = $this->db->prepare('UPDATE student SET name = ?, email = ?, gender = ?, course = ? WHERE id = ?');
        $stmt->bind_param('ssssi', $name, $email, $gender, $course, $id);
        return $stmt->execute();
    }

    public function deleteStudent($id)
    {
        $stmt = $this->db->prepare('DELETE FROM student WHERE id = ?');
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
?>
