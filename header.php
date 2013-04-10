<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CMS</title>
</head>

<body>

<div id="header">
	<div id='navigation'>
        <?php
			echo '<a href="index.php">Articles</a>';
			if(!isset($_SESSION['user_id'])) {
				echo ' | <a href="login.php">Login</a>';
			} else {
				echo ' | <a href="compose.php">Compose Article</a>';
				if ($_SESSION['access_lvl'] > 1) {
					echo ' | <a href="pending.php">Review</a>';
				}
				if ($_SESSION['access_lvl'] > 2) {
					echo ' | <a href="admin.php">Admin</a>';
				}
				echo ' | <a href="cpanel.php">Control Panel</a>';
				echo ' | <a href="transact-user.php?action=Logout">Logout</a>';
				
			}
		
        ?>
        </div>
  <div id="header-content"> 
  	<div id="header-logo">
    	
	</div>
  </div>


	
    <div id="body-content">
    <h1>Blog CMS</h1>		
    <?php
		//if $_SESSION[['name'] is false, we know the user is not logged in
		if (isset($_SESSION['name'])) {
			echo '<div id="logowelcome">';
			echo 'Currently logged in as: ' . $_SESSION['name'];
			echo '</div>';
		}
	?>
     
        <form method='get' action='search.php'>
        <p class='head'>Search</p>
        <p>
        	<input id='searchkeywords' type='text' name='keywords'
            <?php
				if(isset($_GET['keywords'])) {
					//if there are keywords, they will be displayed in the search box
					echo 'value="' . htmlspecialchars($_GET['keywords']) . '" ';
				}
		?>
        />
        <input id='searchbutton' class='submit' type='submit' value='Search'/>
        </p>
       </form>
</div>
<link rel="stylesheet" type="text/css" href="css/header.css" media="screen"/>