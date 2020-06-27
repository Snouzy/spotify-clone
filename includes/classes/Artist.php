<?php

class Artist {
    private $con;
    private $id;

    public function __construct($con, $id) {
        $this->con = $con;
        $this->id = $id;
    }

    public function getName() {
        $artistStmt = mysqli_prepare($this->con, "SELECT `name` FROM `artists` WHERE id=?");
        mysqli_stmt_bind_param($artistStmt, "i", $this->id);
        mysqli_stmt_execute($artistStmt);
        mysqli_stmt_bind_result($artistStmt, $name);
        mysqli_stmt_fetch($artistStmt);
        mysqli_stmt_close($artistStmt);
        echo $name;
    }
}