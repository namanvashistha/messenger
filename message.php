<?php 
session_start();
$rname="this-is-the-new-chat";
if (isset($_SESSION['username'])) {
include 'connection.php';
$uname=$_SESSION['username'];
if (isset($_SESSION['to_name'])) {
$rname=$_SESSION['to_name'];

$q="select * from messenger where 1; ";
$res=mysqli_query($conn,$q);
}
$u=$_SESSION['username'];

if($rname!="this-is-the-new-chat")
{
	$queryl="select distinct * from messenger where to_name='$u' or from_name='$u' order by time desc ;";
	$heading='Chats';
}
else
{
	$queryl="select name from users where 1 ;";
	$heading=' New Chats';
}
	$restl=mysqli_query($conn,$queryl);
	$arr=array();	
	while($row = mysqli_fetch_array($restl))
	{	
		if($rname=="this-is-the-new-chat")
		{
			$arr[]=$row['name'];
		}	
		else
		{
			$arr[]=$row['to_name'];
			$arr[]=$row['from_name'];
		}	
	}
	$arr_dis=array_unique($arr);
	$len=count($arr_dis);
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Messenger</title>
	<link rel="shortcut icon"  href="./webimages/allo-logo.png">
	<link rel="stylesheet" type="text/css" href="styling-msg.css">
	<meta name="viewport" content="width=device-width" />
	 <script type="text/javascript">
		window.location.hash="#bottom";
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-4725824489805055",
    enable_page_level_ads: true
  });
</script>
	 
	 
</head>
<body >
	<nav>
	<span><a href="home.php"> < Back </a></span>
        Just for Practise
	</nav>
	
	<div style="margin-top: 50px; width: 100%; display: inline-flex;">
	<div id="chat-list">
		<div id="name-list">
		<div id="heading"><?php echo $heading;?></div>

		<?php
    	foreach ($arr_dis as $value) 
    		if($value != $_SESSION['username']){?>
   				 <a href="check.php?id=<?php echo $value; ?>"><div class="tabs"><?php	echo $value;?></div>
				</a>
	<?php
	}
	?></br></br>
	</div>	
	<a  href="check.php?new=this-is-the-new-chat"><div id="new-chat" >New Chat</div></a>
	
	</div>

	<div id="chats">
	<div id="ref"><b><b>
	<?php if (isset($_SESSION['to_name'])) echo $_SESSION['to_name']; ?></b></b><hr></div>
	
	<div id="messages">

	<?php  if (isset($_SESSION['to_name'])) {
		while($row = mysqli_fetch_array($res))
           {
           		if($row['from_name']==$uname && $row['to_name']==$rname)
           		{?>
           			<div class="sent">
           			<?php echo $row['message']; ?>
           			</div>
           		<?php
           		}	
           		if($row['from_name']==$rname &&
           			$row['to_name']==$uname)
           		{?>
           			<div class="received">
           			<?php echo $row['message']; ?>
           			</div>
           		<?php	
           		}
           }
       }
       else
       	{echo "click on username to chat<br>and use send button to refresh";}
    ?><br>
    <span id='bottom' style="color:white; position: absolute; bottom:0;">_</span>
</div>
    <div id="footer">
	<form method="post" action="send.php">
		
		<input id="send-box" name="message" placeholder="Type a message">
		<input id="send" type="submit" name="submit" value="Send">
	</form>
	</div>
	</div>
	<div id="right-bar">
		<div id="hello-msg"><b>
		<?php echo 'Hello '.$_SESSION['username']; ?></div></b>
		<div id="online-list">  
              Online Users
            <?php
           
            
              $uname=$_SESSION['username'] ;
              $q="select name from users where online>0; ";
               $res=mysqli_query($conn,$q);
               
    	
	
               
               
            while($row = mysqli_fetch_array($res)){
                  if($row['name']!=$_SESSION['username'])
                  {
                                     
                    ?>
                    </a>
                    <a href="check.php?id=<?php echo $row['name']; ?>"><div class="online-tabs"><?php	echo $row['name'];?> <img src="webimages/online.png"></div>
                    <?php
                    }
                  }


            ?>

        </div>
        </div>
</div>


</body>
</html>
<?php
}
else
{
$_SESSION['invalid']="You must login first";
header('location:sign_login.php');
}
?>