<?php
 
include_once("config.php"); 

 
$data = json_decode(file_get_contents('php://input'), true);

//echo "<pre>Reuest Data"; print_r($data); 

$username 		= $data['username'];
$userpassword 	= $data['password']; 

 
          
 $result=array(); 
 
 ############################ CHECKING USERNAME EXIST OR NOT ##################

		$sql_username = "SELECT * from users where username = '".$username."' and password='".$userpassword."' "; 
		 
		$rs_username  = mysqli_query($con,$sql_username); 
		
		//$res=mysql_num_rows($rs_username);
		
		
		
		if($rows_username = mysqli_fetch_assoc($rs_username)){ 
		
			$email = $rows_username['email'];	 
 			################### End Here ###########################################			
			$result['id']			=$rows_username['id'];
			$result['name']			=$rows_username['username']; 
			
			$result['email']		=$rows_username['email'];
		 
				$dat = array('status'=>'1','result'=>$result);
							echo json_encode($dat);  
			}else{
						$dat = array('status'=>'0','result'=>'');
						echo json_encode($dat); 
					} 	
		
		
 

 
 
?>
