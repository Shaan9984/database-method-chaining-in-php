<?php


// creaet function to pretty print
function prx($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

class DB {

    private $conn; //conn variable
    public $query = ""; //query variable

    public function __construct() {
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "test";
        $this->connect($host,$user,$password,$db);
    }

    // this function is used to connect database
    private function connect($host, $user, $password, $db) {
        @$conn = new mysqli($host, $user, $password, $db);
        if(!empty($conn->connect_error)) {
            $msg = ['error'=>$conn->connect_error];
            prx($msg);
            die();
        }
        $this->conn = $conn;
    }

    // funtion to prepare select query
    public function select($select = "*") {
        $this->query = "SELECT ".$select;
        return $this;
    }

    public function from($table) {
        $this->query .= " FROM ".$table;
        return $this;
    }

    public function where($column, $condition, $value) {
        $this->query .= " WHERE $column $condition '$value'";
        return $this;
    }
    
    public function limit($from, $to = 0) {
        $this->query .= " LIMIT $to, $from";
        return $this;
    }

    public function orderBy($column, $type) {
        $this->query .= " ORDER BY $column ".strtoupper($type);
        return $this;
    }

    public function insert($table, $array) {
        // $str = 
    }

    public function update($keys, $where) {

    }

    public function destroy($where) {

    }

    public function get() {
        $data = mysqli_query($this->conn,$this->query);
        if(!empty($data) && $data->num_rows > 0) {
            $result =  mysqli_fetch_all($data, MYSQLI_ASSOC);
            return $result;
        } else {
            return "no result found";
        }
    }

    public function first() {
        $data = mysqli_query($this->conn,$this->query);
        if(!empty($data) && $data->num_rows > 0) {
            $result =  mysqli_fetch_assoc($data);
            return $result;
        } else {
            return "no result found";
        }
    }

    public function toSql() {
        return $this->query;
    }

}
$db = new DB();
// prx($db);
// die();
$result = $db->select()
            ->from('students')
            // ->where("mobile = 9984033701")
            // ->where("class","=","9th")
            ->orderBy('roll_no','DESC')
            // ->limit(3,2)
            // ->toSql()
            // ->get()
            ->first()
            ;
prx($result);