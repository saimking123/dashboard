<?php
class database{
    private $host ;
    private $dbusername ;
    private $dbpassword ;
    private $dbname ;

    protected function connect(){
        $this->host='localhost';
        $this->dbusername = 'root';
        $this->dbpassword = '';
        $this->dbname = 'website_data';
        $conn = new mysqli($this->host,$this->dbusername,$this->dbpassword,$this->dbname);
        return $conn;
    }
}

    class query extends database{
        public function getData($table, $feild='*', $condition_arr ='', $order_by_feild ='', 
        $order_by_type = 'desc', $limit=''){
            $sql = "select $feild from $table " ;
            if($condition_arr !='' ){
                $sql.=' where ';
                $c = count($condition_arr);
                $i=1;
                foreach($condition_arr as $key => $val){
                if($i==$c){
                    $sql.= "$key='$val'";
                    
                }else{
                    $sql.= "$key='$val' and ";
                }
                $i++;

                 }
            }
            if($order_by_feild != ''){
                $sql.= "order by  $order_by_feild $order_by_type "; 
            }

            if($limit != ''){
                $sql.= "limit $limit"; 
            }
        
            $result = $this->connect()->query($sql);
            // print_r($result);
            if($result->num_rows>0){
                $arr =array();
                while($row=$result->fetch_assoc()){
                   $arr[] = $row;
                    // print_r($row);
                }
                return $arr;
            }else{
                return 0;
            }
        }

//  insert work..
        public function insertData($table, $condition_arr ='',){
            if($condition_arr !='' ){
                foreach($condition_arr as $key=>$val){
                    $feildArr[] = $key;
                    $valueArr[] = $val;

                }
                $feild=implode(",",$feildArr);
                $value=implode(" ','",$valueArr);
                $value="'".$value."'";
                // echo $value;
                $sql = "insert into $table ($feild) values($value) ";
           
                // die($sql);
                    $result = $this->connect()->query($sql);
            }
            
// image data insert
// public function insertData($table, $condition_arr = [])
// {
//     if (!empty($condition_arr)) {
//         $feildArr = [];
//         $valueArr = [];

//         foreach ($condition_arr as $key => $val) {
//             $feildArr[] = $key;
//             $valueArr[] = $val;
//         }

//         $feild = implode(",", $feildArr);
//         $value = implode("','", $valueArr);
//         $value = "'" . $value . "'";

//         $sql = "INSERT INTO $table ($feild) VALUES ($value)";

//         $result = $this->connect()->query($sql);

//         if ($result) {
//             return true;
//         } else {
//             return false;
//         }
//     }

//     return false;
// }

// public function uploadImage($imageFile, $targetDirectory)
// {
//     $targetFileName = $targetDirectory . basename($_FILES[$imageFile]['name']);

//     if (move_uploaded_file($_FILES[$imageFile]['tmp_name'], $targetFileName)) {
//         return $targetFileName; // Return the path to the uploaded image
//     } else {
//         return false; // Failed to upload the image
//     }
// }



            
            }
        
            //  delete work..
            public function deleteData($table, $condition_arr){
                if($condition_arr !='' ){
                    $sql = "delete from  $table where ";
                    if($condition_arr !='' ){
                        $c = count($condition_arr);
                        $i=1;
                        foreach($condition_arr as $key => $val){
                        if($i==$c){
                            $sql.= "$key='$val'";
                            
                        }else{
                            $sql.= "$key='$val' and ";
                        }
                        $i++;
        
                         }
                         echo $sql;
                        $result = $this->connect()->query($sql);
                }
                
                }
            }


            // update work


            public function updateData($table, $condition_arr,$where_feild,$where_value){
                if($condition_arr !='' ){
                    $sql = "update $table set ";
                        $c = count($condition_arr);
                        $i=1;
                        foreach($condition_arr as $key => $val){
                        if($i==$c){
                            $sql.= "$key='$val'";
                            
                        }
                        else{
                            $sql.= "$key='$val' ,";
                        }
                        $i++;
        
                         }
                        $sql.= "where $where_feild ='$where_value'  ";
                        //  echo $sql;
                        $result = $this->connect()->query($sql);
              
                
                }
            }

            public function get_safe_str($str){
                if($str!= ''){
                return mysqli_real_escape_string($this->connect(),$str);
                }
                }   
                 }
// select $feild from table where $condition like $like order by $order_by_feild $order_by_type limit $limit;
// $feild-> * or name,email
// $table->user

?>