<?php


$servername="localhost";
$username="root";
$password="";
$dbname="TestDB";
$table="Employees";

$action= $_POST['action'];

$link =   mysqli_connect($servername,$username,$password,$dbname);


if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
   if("CREATE_TABLE" == $action ){
$sql="CREATE TABLE IF NOT EXISTS $table ( id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
   first_name VARCHAR(30) NOT NULL,
   last_name VARCHAR(30) NOT NULL
   )";
if ($result = mysqli_query($link, $sql)) {
  echo "success ";
}
else{
    echo 'erorr';
}
mysqli_close($link);
return ;
   }

   if("GET_ALL" == $action){


    $db_data = array();
    $sql= "SELECT id, first_name , last_name from $table ORDER BY id DESC";
    $result= $link-> query($sql);

    if($result-> num_rows > 0 ){
 while($row= $result-> fetch_assoc())
 {$db_data[]= $row;}
echo json_encode($db_data);}
    else{echo "error";}
    $link-> close();
    return;
   }


//ADD

if ("ADD_EMP" == $action){
$first_name= $_POST['first_name'];
$last_name= $_POST['last_name'];
$sql= "INSERT INTO $table (first_name , last_name) VALUES ('$first_name', '$last_name' )";
$result = $link->query($sql);
echo  "sucess";
$link -> close();
return;
}

//UPDATE


if ("UPDATE_EMP == $action") {
    $emp_id = $_POST['$emp_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $sql= "UPDATE $table SET first_name ='$first_name', last_name= '$last_name' WHERE id = $emp_id  ";
    if ($link->query($sql)== TRUE)
    {echo "sucess";}
else{echo "error";}
$link -> close();
return;
}




if ("DELETE_EMP == $action") {
    $emp_id = $_POST['emp_id'];
$sql = "DELETE FROM $table WHERE id = $emp_id";
 if ($link->query($sql)== TRUE)
    {echo "sucess";}
else{echo "error";}
$link -> close();
return;
}





?>
 



