<?php		
	$sql_dem="select * from tblluottruycap";
	$luottruycap= mysqli_query($con, $sql_dem);		
	$dong_dem= mysqli_fetch_array($luottruycap);
	$so= $dong_dem["soluot"]+1;
	$sql_dem="update tblluottruycap set soluot='$so'";
	mysqli_query($con,$sql_dem);
	 $ip="10.0.0.1";	
	  if(isset($_SERVER["REMOTE_ADDR"])) {  $ip = $_SERVER["REMOTE_ADDR"];}
	  else if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])) 
	  		{  $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];	  }
	  		else if(isset($_SERVER["HTTP_CLIENT_IP"]))
			{	$ip = $_SERVER["HTTP_CLIENT_IP"];	}	   	
	  //$dd= $_SERVER['PHP_SELF'];	   
	  $tg=time();	  $tgout=900;
	  $tgnew=$tg - $tgout;	
	  $sql="select * from tbluseronline where ip= '$ip'";
	  $online= mysqli_query($con, $sql);
	  $sodong= mysqli_num_rows($online);
	  if ($sodong>0) 
	  {
		 $sql="update tbluseronline set tgtmp='$tg' where ip='$ip'";
	 	 $query=mysqli_query($con, $sql);
	  }
	  else
	  {
		 $sql="insert into tbluseronline (ip, tgtmp) values('$ip','$tg')";
		 $query=mysqli_query($con,$sql);
	  }	 
	  $sql="delete from tbluseronline where tgtmp < $tgnew";
	  $query=mysqli_query($con,$sql);
	  $sql="select distinct ip FROM tbluseronline";
	  //$sql="select distinct ip FROM tbluseronline WHERE local='$dd'";
	  $online=mysqli_query($con,$sql);
	  $user = mysqli_num_rows($online);	  
	  echo $user."/".$so."<br>";
?>