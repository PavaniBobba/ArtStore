<?php include 'NavigationHeader.php' ?>

<div class="jumbotron">
	<div class="container">
		<h1>Welcome to Assignment #3</h1>
		<h4>This is the third assignment for <strong>Pavani Bobba</strong> for CSE 5335</h4>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-2">
			<h3><span class="glyphicon glyphicon-info-sign"></span> About us</h3>
			<p>What this is all about and other stuff</p>
			<p><a class="btn btn-default" href="<?php echo 'About.php'; ?>" role="button"><span class="glyphicon glyphicon-link"></span> Visit Page</a></p>
		</div>
		<div class="col-md-2">
			<h3><span class="glyphicon glyphicon-list"></span> Artist List</h3>
			<p>Displays a list of artist names as links</p>
			<p><a class="btn btn-default" href="<?php echo 'Part01_ArtistsDataList.php'; ?>" role="button"><span class="glyphicon glyphicon-link"></span> Visit Page</a></p>
		</div>
		<div class="col-md-2">
			<h3><span class="glyphicon glyphicon-user"></span> Single Artist</h3>
			<p>Displaus information for a single artist</p>
			<p><a class="btn btn-default" href="<?php echo 'Part02_SingleArtist.php'; ?>?id=19" role="button"><span class="glyphicon glyphicon-link"></span> Visit Page</a></p>
		</div>
		<div class="col-md-2">
			<h3><span class="glyphicon glyphicon-picture"></span> Single Work</h3>
			<p>Displays information for a single work</p>
			<p><a class="btn btn-default" href="<?php echo 'Part03_SingleWork.php'; ?>?id=394" role="button"><span class="glyphicon glyphicon-link"></span> Visit Page</a></p>
		</div>
		<div class="col-md-2">
			<h3><span class="glyphicon glyphicon-search"></span> Search</h3>
			<p>Perform search on ArtWorks tables</p>
			<p><a class="btn btn-default" href="<?php echo 'Part04_Search.php'; ?>" role="button"><span class="glyphicon glyphicon-link"></span> Visit Page</a></p>
		</div>
	</div>
</div>

</body>
</html>