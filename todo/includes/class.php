<?php

class USER {
        public $id;
        public $username;
        public $email;
        public $password;
        public $firstname;
        public $lastname;
        public $photo;


    public function updateinformation($id, $username, $email, $firstname, $lastname, $conn){


        $update_query = mysqli_query($conn,"UPDATE users SET username = '" . $username . "', email = '" . $email . "', firstname = '" . $firstname . "' , lastname = '". $lastname ."' WHERE id = '" . $id . "'");

        header("Location: user.php");
    }



    function ChangePhoto($id,$photo,$conn){

        $update_query = mysqli_query($conn,"UPDATE users SET photo = '" . $photo . "' WHERE id = '" . $id . "'");

        header("Location: user.php");


    }

    function ChangePassword($id, $password, $conn){

        $update_query = mysqli_query($conn,"UPDATE users SET password = '" . $password . "' WHERE id = '" . $id . "'");

        header("Location: user.php");



    }

}

class TODOLIST {
        public $id;
        public $name;
        public $color;
        public $user_id;



    function DeleteToDoList($conn){

        $sqldel = "DELETE FROM todolist WHERE id=$this->id";
        return $result = $conn->query($sqldel);

    }


    function UpdateToDolist($id,$name,$color,$conn){

        $update_query = mysqli_query($conn,"UPDATE todolist SET name = '" . $name . "', color = '" . $color . "' WHERE id = '" . $id . "'");

        header("Location: to do.php");

    }

}


class TASK {

        public $id;
        public $taskText;
        public $done;
        public $todolist_id;



    function ChangeTaskStatus($conn){

        $update_query = mysqli_query($conn,"UPDATE task SET  done = $this->done WHERE id = $this->id ");


    }


    function DeletTask($conn){

        $update_query = mysqli_query($conn,"DELETE FROM task WHERE id=1");






        header("Location: tasks.php?idtask=".$_GET["idtask"]);

    }

    function ChangeTaskText($conn){

        $update_query = mysqli_query($conn,"UPDATE task SET taskText = '" . $this->name . "' WHERE id = '" . $this->id . "'");
        if(isset($_GET['idtask'])) { $id = $_GET['idtask'];

        }


        header("Location: tasks.php?idtask=".$_GET["idtask"]);

    }
}

?>
