<?php 
	require_once 'conn.php';
	$title='';
	$body='';
	$article='';
	$author_id='';
	if(isset($_GET['a'])
		and $_GET['a'] == 'edit'
		and isset($_GET['article'])
		and $_GET['article']) {
			$sql = "SELECT title, body, author_id FROM cms_articles " .
			"WHERE article_id=" . $_GET['article'];
			$result = mysql_query($sql, $conn)
				or die('Could not retrieve article data: ' . mysql_error());
			$row = mysql_fetch_array($result);
			$title = $row['title'];
			$body = $row['body'];
			$article = $_GET['article'];
			$author_id = $row['author_id'];
		}
		require_once 'header.php';
?>
<div id="body-content">
<form method ="post" action="transact-article.php">
	<h2>Compose Article</h2>
    <p>
    	Title: <br/>
        <input type="text" class="title" name="title" maxlength="255" value="<?php echo htmlspecialchars($title); ?>">
    </p>
    <p>
    	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    	Body: <br/>
        <textarea class="ckeditor" name="body" rows="10" cols="60"><?php echo htmlspecialchars($body); ?></textarea>
    </p>
    <p>
    	<?php
			echo '<input type="hidden" name="article" value="' .
			$article . "\" />\n";
			if ($_SESSION['access_lvl'] < 2) {
				echo '<input type="hidden" name="authorid" value="' .
				$author_id . "\" />\n";
			}
			if($article) {
				echo '<input type="submit" class="submit" name="action" ' .
				"value=\"Save Changes\" />";
			} else {
				echo '<input type="submit" class="submit" name="action" ' .
				"value=\"Submit New Article\" />";
			}
		?>
	</p>
   </form>
   </div>
<?php require_once 'footer.php' ?>

<link rel="stylesheet" type="text/css" href="css/main.css" media="screen"/>