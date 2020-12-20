<?php
    require_once('./config/db1.php');

    function fetchRecordAll($entity,$start=0,$end=10){
        // fetch records for entity(category, article, comment) where status is true
    // start and end will control the behaviour for pagination  
    $sql = "select * from $entity where status = 'A' limit $start, $end";
    global $con;
    $res = mysqli_query($con, $sql);
    $data = array();
    if (mysqli_num_rows($res) > 0) {
        while ($record = mysqli_fetch_assoc($res)) {
            $data[] = $record;
        }
        return $data;
    } else {
        return false;
    }
       
    }

    function fetchRecordSpecific($entity,$primary){
        // fetch single record for entity(category, article, comment)
       
	$sql="select * from $entity where id=$primary";
	global $con;
	$result=mysqli_query($con,$sql);
	$data=array();
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($res)){
			$data=$row;
		}
		return $data;
		}
		else
		{
			return false;
		}
	}

    function insertRecord($entity,$data){
          // insert single record for entity(category, article, comment) with data passed
    //echo 'Insert Called';
    $sql = '';
    global $con;
    switch ($entity) {
        case 'user':
            $sql = "insert into user(name,email,pwd,status) values ('$data[user]','$data[email]','$data[pwd]', 'A')";
            break;

        case 'category';
            $sql = "";
            break;
        case 'article';
            $sql = "";
            break;
        case 'comment';
            $sql = "";
            break;
    }
    $res = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) > 0) {
        echo 'Insert called.<br>';
    } else {
        echo 'Insert failed.<br>';
        echo mysqli_error($con);
    }
    }

    function updateRecord($entity,$primary,$data){
        // update single record for entity(category, article, comment) using its primary key with data passed
       
    }

    function deleteRecord($entity,$primary){
        // delete single record for entity(category, article, comment) using its primary key
		$sql="delete from $entity where id=$primary"; 
		
    }

   function authenticate($username, $pwd){
        // if successful, redirect to dashboard
        // else stay on login page
	      // if successful, redirect to dashboard
        // else stay on login page
        require_once('config/db1.php');
        global $con;
        $sql = "select * from user where name='$username' and status='A' and pwd='$pwd'";
        $res = mysqli_query($con, $sql);
        return $res;
	}
?>