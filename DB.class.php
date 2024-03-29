<?php
/*
 * DB Class
 * This class is used for database related (connect, insert, update, and delete) operations
 * @author    CodexWorld.com
 * @url        http://www.codexworld.com
 * @license    http://www.codexworld.com/license
 */
class DB{
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName     = "crud";
    
    public function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
    
    /*
     * Returns rows from the database based on the conditions
     * @param string name of the table
     * @param array select, where, order_by, limit and return_type conditions
     */

    
    public function getRows($table, $conditions = array()){
        $sql = 'SELECT ';
        $sql .= array_key_exists("select",$conditions)?$conditions['select']:'*';
        $sql .= ' FROM '.$table;
        if(array_key_exists("where",$conditions)){
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions['where'] as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $sql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        
        if(array_key_exists("order_by",$conditions)){
            $sql .= ' ORDER BY '.$conditions['order_by']; 
        }else{
            $sql .= ' ORDER BY id DESC '; 
        }
        
        if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
            $sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit']; 
        }elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
            $sql .= ' LIMIT '.$conditions['limit']; 
        }
        //echo "<pre>";echo $sql;
        $result = $this->db->query($sql);
        
        if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){
            switch($conditions['return_type']){
                case 'count':
                    $data = $result->num_rows;
                    break;
                case 'single':
                    $data = $result->fetch_assoc();
                    break;
                default:
                    $data = '';
            }
        }else{
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
        }
        return !empty($data)?$data:false;
    }
    public function filterData($table,$request){

        $query = "SELECT * FROM ".$table."  WHERE status='$request'";
        $filter = $this->db->query($query);
        return $filter;



    }
     public function submitUserData($table,$username, $password){
        //  $query = "SELECT username from ".$table."  WHERE username='.$username.' and password='.$password.'";
        
       $getData=mysqli_query($this->db,"SELECT `username` FROM `login` WHERE `username`='$username' AND `password`='$password'");
        if(mysqli_num_rows($getData) >= 1){
          $result = "success";
       } else{
          $result ="error";
       }

         // $data = "hello";
        // $result = $this->db->query($query);
        // echo $result;
        // $finalData = '';
        // while ($row = $result->fetch_assoc()) {
        // $finalData = $row['username']."<br>";
        // }
        return  $result;
     }
    public function getFullData($table){
        $query = "SELECT * FROM '.$table.'";
        $completeData = $this->db->query($query);
        return $completeData;

    }
    //  public function disconnectdb(){
    //    return  mysql_close($conn);
    // }
    
    /*
     * Insert data into the database
     * @param string name of the table
     * @param array the data for inserting into the table
     */
    public function insert($table, $data){
        if(!empty($data) && is_array($data)){
            $columns = '';
            $values  = '';
            $i = 0;
            if(!array_key_exists('created',$data)){
                $data['created'] = date("Y-m-d H:i:s");
            }
            if(!array_key_exists('modified',$data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
            foreach($data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $columns .= $pre.$key;
                $values  .= $pre."'".$this->db->real_escape_string($val)."'";
                $i++;
            }
            $query = "INSERT INTO ".$table." (".$columns.") VALUES (".$values.")";
            $insert = $this->db->query($query);
            return $insert?$this->db->insert_id:false;
        }else{
            return false;
        }
    }
    
    /*
     * Update data into the database
     * @param string name of the table
     * @param array the data for updating into the table
     * @param array where condition on updating data
     */
    public function update($table, $data, $conditions,$comment,$id){
        if(!empty($data) && is_array($data)){
            $colvalSet = '';
            $whereSql = '';
            $i = 0;
            if(!array_key_exists('modified',$data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
            foreach($data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $colvalSet .= $pre.$key."='".$this->db->real_escape_string($val)."'";
                $i++;
            }
            if(!empty($conditions)&& is_array($conditions)){
                $whereSql .= ' WHERE ';
                $i = 0;
                foreach($conditions as $key => $value){
                    $pre = ($i > 0)?' AND ':'';
                    $whereSql .= $pre.$key." = '".$value."'";
                    $i++;
                }
            }
            $columnName = 'comments';
            $delimter = '      ';
            $query = "UPDATE ".$table." SET ".$colvalSet.$whereSql;
            //  $queryTwo = "UPDATE" .$table." SET " .$columnName. "= CONCAT (".$columnName. "," .$comment.")";
            // update `users` set `comments` = CONCAT(`comments`,'AppendValue')
            $queryTwo = "UPDATE `users`  SET `comments` = CONCAT(`comments`,'.$delimter.$comment') WHERE `id`='$id'";
            $this->db->query($queryTwo);
            $update = $this->db->query($query);
            //  $update = $this->db->query($queryTwo);
            return $update?$this->db->affected_rows:false;
        }else{
            return false;
        }
    }
    // public function updated($table,$idComment){
    //     $updateQuery = "SELECT * FROM '.$table.' WHERE `id`= '.$idComment.'";
    //     return $updateQuery;

    // }
    
    /*
     * Delete data from the database
     * @param string name of the table
     * @param array where condition on deleting data
     */

 
     public function getSearch($table,$search){
        $searchQuery = "SELECT * FROM users WHERE name OR course_name OR email LIKE '%".$search."%'";
        $resultOfSearch = $this->db->query($searchQuery);
        // echo '<h1>Hello</h1>';
        return $resultOfSearch;
    }
    public function delete($table, $conditions){
        $whereSql = '';
        if(!empty($conditions)&& is_array($conditions)){
            $whereSql .= ' WHERE ';
            $i = 0;
            foreach($conditions as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $whereSql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        $query = "DELETE FROM ".$table.$whereSql;
        $delete = $this->db->query($query);
        return $delete?true:false;
    }
}