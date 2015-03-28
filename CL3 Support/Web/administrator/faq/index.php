<?php
	require_once('include/db.class.php');
	require_once('include/user.class.php');
	$faqAdmin = new User();
	if(isset($_GET['logout']))
		$faqAdmin->logout();	
	if(isset($_POST['login']) and isset($_POST['password']))
		$faqAdmin->login($_POST['login'],$_POST['password']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>FAQ Admin</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery-impromptu.2.7.min.js"></script>
		<script type="text/javascript" src="js/functions.js"></script>
	</head>
	<body>
		<div id="wraper">	
			<div id="header"><h2>Head Helper FAQ Control Panel</h2><?php if(!empty($_SESSION['admin'])) echo '<a href="index.php?logout" class="logout">Logout</a>'; ?></div>
			<div id="messages"></div>	
			
			<?php
				if(empty($_SESSION['admin'])){
			?>
			
				<div class="LoginContainer">
					<form action="" method="post" id="loginForm">
						<p><label>Login : </label><input type="text" name="login"></p>
						<p><label>Password : </label><input type="password" name="password"></p>
						<p><input type="submit" value="Enter" class="submit"></p>
					</form>
				</div>
			<?php
				}
				elseif(!empty($_SESSION['admin'])){
					
				$db = new Db();
				$db->connect();
				
				$categories = $db->select("SELECT * FROM faq_category ORDER BY order_number");
				?>
				<div class="container">
				<div id="faqpanel" class="sortableCategorys">
				<?php
				while($row = $db->get_row($categories)){
					$catId = $row['id_category'];
				?>
			
				<div class="category" id="category<?php echo $catId; ?>">
					<span class="title"><?php echo $row['title'] ?></span><a href="javascript:;" class="edit" onclick="editCategory(<?php echo $catId; ?>);"><img src="images/edit.png" alt="edit"></a><a href="javascript:;" class="deleteCat" onclick="removeCategory(<?php echo $catId; ?>);"><img src="images/delete.png" alt="delete"></a><a href="javascript:;" class="toggle"><img src="images/bottom-arrow.gif" alt="toggle"></a>
					
					<?php 
					$questions = $db->select("SELECT * FROM faq_answers WHERE category_id = ".$catId." ORDER BY order_number");
					if($db->row_count){
					?>
					<ul class="sortableQuestions">
						<?php 
						while($row = $db->get_row($questions)){ 
						$questionId = $row['id'];
						?>
						<li id="question<?php echo $questionId; ?>">
							<span class="question"><?php echo $row['question'] ?></span><a href="javascript:;" class="edit" onclick="editQuestion(<?php echo $questionId; ?>);"><img src="images/edit.png" alt="edit"></a><a href="javascript:;" class="delete" onclick="removeQuestion(<?php echo $questionId; ?>);"><img src="images/delete.png" alt="delete"></a><a href="javascript:;" class="toggle"><img src="images/bottom-arrow.gif" alt="toggle"></a>
							<p><?php echo $row['response'] ?></p>
						</li>
						<?php } ?>			
					</ul>
					<?php } ?>
					<a href="javascript:;" class="addQuestion" onclick="addQuestion(<?php echo $catId; ?>);">Add Step / Solution</a>
				</div>

	
			<?php
				}
			?>
			
			</div>
			<a href="javascript:;" class="addCategory" onclick="addCategory();">Add Issue</a>
			</div>
			<?php
			}
			?>
	</div>
	</body>
</html>