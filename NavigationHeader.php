<!DOCTYPE html>
<html>
<head>
	<title>Project 3</title>
	<!-- <meta charset="utf-16"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-default">
<div class="container-fluid">
 <div class="navbar-header">
    <a class="navbar-brand" href="#">Assign 3</a>
</div>
<div id="navbar" class="navbar-collapse collapse">
	<ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo 'default.php'; ?>">Home</a></li>
        <li><a href="<?php echo 'About.php'; ?>">About US</a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle"data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
        <ul class="dropdown-menu" >
        	<li><a href="<?php echo 'Part01_ArtistsDataList.php'; ?>">Artists Data List (Part 1)</a></li>
        	<li><a href="<?php echo 'Part02_SingleArtist.php'; ?>?id=19">Single Artist (Part 2)</a></li>
        	<li><a href="<?php echo 'Part03_SingleWork.php'; ?>?id=394">Single Work (Part 3)</a></li>
        	<li><a href="<?php echo 'Part04_Search.php'; ?>">Search (Part 4)</a></li>
        </ul>
        </li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
     	<li><a href="#">Pavani Bobba</a></li>
     	<li>
     		<form class="navbar-form navbar-right" id="header-search" action="<?php echo 'Part04_Search.php'; ?>" method="post"> <!--    --> 
     			<div class="form-group">
     			 	<input type="text" placeholder="Search Paintings" class="form-control" name="text_to_search">
     			</div>
        		<button type="search" class="btn btn-primary" name="filter" value="checked-title" id="search">Search</button>
        	</form>
        </li>
    </ul>
</div>
</div>
</nav>