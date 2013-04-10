<?php
/*
Justin Bernklau's PHP Content Management System

	User Name			       Email					Password	Access Level
       JB2		     justin@bernklausurveying.com	      cms			 1
	   user				    temp@uwsp.edu				 user			 2
  Justin Bernklau		jbern468@uwsp.edu				 temp			 3
  
  DB = blogcms
  
  The functionality of my CMS is about 90%. The Modify Account does not work properly and nor does the Control Panel - Change my information. These two buttons do not have any affect on the database so I must have an error
  or typo in transact-user.php. My trouble shooting of the file turned up no obvious answer, but I may need to go through it again.
  Also, control panel appears differently when different users are present. For some reason the CSS properties change when users are different - grey text vs. black text.
  Another minor detail to note is the Admin page. I could not get the CSS formating to work right on the page because of where the div for body content was placed. I played around with different locations, but I believe 
  that due to PHP being server side, the client side CSS is having issues. Is there a better way to implement CSS than the way I did? I have one main CSS file linked to every page besides header.php. header.php has its own  properties which holds a menu navigation bar across the top and a consistent color scheme on each page. 
  
  The changes I made to my CMS for the extra points are as follows:
  3. I adjusted the CSS styles throughout my CMS to format a more consistent design and look. I wanted to re-locate the navigation to the top header bar and move the body content so it would be centered in the document. 
  CSS styles helped me do just that with the only issue being addresed above. 
  4. I implemented JS form validation with my user account. The validate.js file includes a function that determines the correct form input values and validates them. If they are not correct, a message is displayed to the 
  user(next to the input field) that makes them aware of the invalid field. 
  12. CKEditor was added to the article compostion page to allow for a much more free input. To demonstrate, I uploaded a picture as an article. 




*/
	require_once 'conn.php';
	require_once 'outputfunctions.php';
	require_once 'header.php';
	?>
    <div id="body-content"><?php
	$sql = "SELECT article_id FROM cms_articles WHERE is_published=1 " .
		"ORDER BY date_published DESC";
	$result = mysql_query($sql, $conn);
	if(mysql_num_rows($result)== 0) {
		echo " <br />\n";
		echo " There are currently no articles to view.\n";
	} else {
		while ($row=mysql_fetch_array($result)) {
			outputStory($row['article_id'], TRUE);
		}
	}
	require_once 'footer.php';
?>
	</div>


<link rel="stylesheet" type="text/css" href="css/main.css" media="screen"/>