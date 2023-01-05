<?php 
session_start();
if($_SESSION['con'] != 'true')
	echo "<script type='text/javascript'>window.location='../index.html';</script>";

$_SESSION['newTry'] = 1;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Afficher CV</title>
	<link rel="stylesheet" type="text/css" href="./css/afficherCv.css">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/accueil.css">
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">SenCv</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li ><a href="#">Accueil</a></li>
					<li ><a href="./creerCv.html">Creation Cv</a></li>
					<li><a href="./editerCv.php">Editer Cv</a></li>
					<li class="active"><a href="./afficherCv.php">Afficher mon Cv</a></li>
					<li ><a href="./script/deconnexion.php">Deconnexion</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<center><h1>Mon CV</h1></center>
	<br/>
	<hr/>
	<br/>
	<div class="page">
		<div class="infoPerso">
			<?php  
			$id=$_SESSION['id_User'];
			$bdd='gestioncv';
			$db=mysqli_connect('localhost', 'root', '') or die("erreur de connexion ");
			mysqli_select_db($db,$bdd) or die("erreur de connexion a la base de donnees");
			$query_1="select * from infoPerso where id=$id ";
			$result=mysqli_query($db,$query_1);
			while($enregistrement=mysqli_fetch_array($result))
				{?>
			<p><strong><?php echo $enregistrement["prenom"]; ?>&nbsp;&nbsp;&nbsp;  <?php echo $enregistrement["nom"];?></strong><br/>Né le <?php echo $enregistrement["dateNaissance"];?> </p><?php 
		}?>
		
		
	</div>
	<br/><br/><br/>
	<div class="section">
		<h2>Formation</h2>
		<div class="" style="position:absolute;left:260px;">
			<?php $query_1="select * from formation ";
			$result=mysqli_query($db,$query_1);
			while($enregistrement=mysqli_fetch_array($result))
				{?>
			<p><?php echo $enregistrement["annee"]; }?></p>
		</div>
		<div class="sec_droite">

			<?php  $query_1="select * from formation ";
			$result=mysqli_query($db,$query_1); while($enregistrement=mysqli_fetch_array($result))
			{?>
			<p><?php echo $enregistrement["intitule"];?>&nbsp;&nbsp;<?php echo $enregistrement["ecole"];}?></p>
		</div>
	</div>
	<div class="section">
		<h2>Experiences Professionnelles</h2>
		<div class="sec_gauche">
			<?php $query_1="select * from stage ";
			$result=mysqli_query($db,$query_1);
			while($enregistrement=mysqli_fetch_array($result))
				{?>
			<p><?php echo $enregistrement["debut"]; ?>&nbsp;/&nbsp;<?php echo $enregistrement["fin"]; }?></p>
		</div>
		<div class="sec_droite">
			
			<?php $query_1="select * from stage ";
			$result=mysqli_query($db,$query_1); while($enregistrement=mysqli_fetch_array($result))
			{?>
			<p><?php echo $enregistrement["entreprise"]; }?></p>
		</div>
	</div>
</div>
</body>
</html>