<?php
session_start();

function is_user_logged_in(){
    // return true if user is already logged in
    // otherwise return false
	if(isset($_SESSION['user'])&& $_SESSION['user']){
		return true;
	}
	else {
		return false;
	}
    
}

function make_user_session($userdata){
    // set user details in session
		if(mysqli_num_rows($userdata)>0){
			while($row=mysqli_fetch_assoc($userdata)){
				session_start();
				$_SESSION['user']=$data;
			}
		}
  

}

function destroy_user_session(){
    // destroy session and redirect to login page
	//if(isset($_POST['logout'])){
		session_destroy();
		header('location:index.php');
	}
	
   


?>