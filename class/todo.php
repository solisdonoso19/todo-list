<?php
require_once('modelo.php');
class todo extends ModeloBD
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $query = 'SELECT * FROM checklist';
        $consulta = $this->_DB->query($query);
        $res = $consulta->fetch_all(MYSQLI_ASSOC);
        if (!$res) {
            echo 'ERROR QUERY';
            return 'ERROR';
        } else {
            return $res;
            $res->close();
            $this->_DB->close();
        }
    }

    public function insert_new($taskTitle, $taskDescription, $taskStatus, $taskDueDate, $taskAssignee, $taskType){
        //echo "Entro a insert_new()";
        $query = "INSERT INTO checklist (titulo, descripcion, estado, fecha, responsable, tipo_tarea) values ('$taskTitle', '$taskDescription', '$taskStatus', '$taskDueDate', '$taskAssignee', '$taskType')";
        $consulta = $this->_DB->query($query);
            // Ejecuta la consulta
        if ($consulta) {
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $this->_DB->error;
            return false; // Indica que hubo un error al ejecutar la consulta
        }
    }
}
