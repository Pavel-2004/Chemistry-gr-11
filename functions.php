<?php
$conn = mysqli_connect("localhost", "root", "", "rpt");
class create {
    public $conn;
    public $name;
    public $grade;
    function __construct($conn, $name, $grade){
        $this->conn = $conn;
        $this->name = $name;
        $this->grade = $grade;
    }
    
    public function Main(){
        $sql = "INSERT INTO grades (student, grade) VALUES ('$this->name', $this->grade);";
        mysqli_query($this->conn, $sql); 
    }
}
class read {
    public $conn;
    function __construct($conn){
        $this->conn = $conn;
    }
    function Main(){
        $sql = "SELECT * FROM grades";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0){
            ?>
            <table>
            <tr>
                <td>Name</td>
                <td>Grade</td>
            </tr>
            <?php
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?=$row["student"]?></td>
                    <td><?=$row["grade"]?></td>
                </tr>
                <?php
            }
            ?>
            </table>
            <?php
        } else{
            ?>
            <h1>No data</h1>
            <?php
        }
        

    }
}




class update {
    public $conn;
    function __construct($conn){
        $this->conn = $conn;
    }
    function Main(){
        $sql = "SELECT * FROM grades";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0){
            ?>
            <table>
            <tr>
                <td>Name</td>
                <td>Grade</td>
            </tr>
            <?php
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?=$row["student"]?></td>
                    <td><?=$row["grade"]?></td>
                    <td>
                        <form action="update.php" method="get">
                            <input type="number" name=<?=$row["student"]?>>

                    </td>
                </tr>
                <?php
            }
            ?>
            </table>
            <input type="submit" value="submit">
            </form>
            <?php
        } else{
            ?>
            <h1>No data</h1>
            <?php
        }
        

    }
}

class delete {
    public $conn;
    public $student;
    function __construct($conn, $student){
        $this->conn = $conn;
        $this->student = $student;
    }
    function Main(){
        $sql = "DELETE FROM grades WHERE student = '$this->student'";
        mysqli_query($this->conn, $sql);
    }
}
