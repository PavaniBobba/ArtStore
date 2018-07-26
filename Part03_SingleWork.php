<?php
include 'NavigationHeader.php'; 
$ArtWorkID=$_GET['id'];
$dbhost = 'localhost';
           $dbuser = 'root';
           $dbpass = 'root';
           
           $conn = mysql_connect($dbhost, $dbuser, $dbpass);
           
           if(! $conn ) {
              die('Could not connect: ' . mysql_error());
           }
           
           $sql = 'SELECT *,aw.Description FROM artists as a, artworks as aw, genres as g, subjects as s, artworkgenres as ag, artworksubjects as asub where a.ArtistID=aw.ArtistID and aw.ArtWorkID=ag.ArtWorkID and aw.ArtWorkID=asub.ArtWorkID and ag.GenreID=g.GenreID and asub.SubjectID=s.SubjectId and aw.ArtWorkID='.$ArtWorkID;
           mysql_select_db('art');
           $retval = mysql_query( $sql, $conn );
          if (mysql_num_rows($retval) == 0){
                    header("Location:Error.php");
                    exit;
                }
           if(! $retval ) {
              die('Could not get data: ' . mysql_error());
           }
           
           while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
              $Title=$row['Title'];
              $FirstName=$row['FirstName'];
              $LastName=$row['LastName'];
              $Description=$row['Description'];
              $image=$row['ImageFileName'];
              $YearOfWork= $row['YearOfWork'];
              $Width= $row['Width'];
              $Height= $row['Height'];
              $Medium=$row['Medium'];
              $Home= $row['OriginalHome'];
              $ArtistID=$row['ArtistID'];
              $cost=$row['MSRP'];
              $cost=number_format($cost, 2);
              $genres[]=$row['GenreName'];
              $subjects[]=$row['SubjectName'];

            }
?>
<div class="container">
<div class="page-header">
<h2><?php echo $Title?></h2>
<p>By <a href="Part02_SingleArtist.php?id=<?php echo $ArtistID?>"><?php echo $FirstName?> <?php echo $LastName?></a></p>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="#" data-toggle="modal" data-target="#image-gallery">
            <img src='images/art/works/medium/<?php echo $image?>.jpg' class="img-responsive img-rounded center-block img-thumbnail" alt="">
            </a>
        </div>
        <div class="col-md-8">
            <div class="row" id ="des">
            <div class="col-md-8">
            <p><?php echo $Description?></p>
            <p id="cost">$<?php echo $cost?></p>
            <button class="btn btn-default"><a href="#"><span class="glyphicon glyphicon-gift"></span> Add to Wish List</a></button>
            <button class="btn btn-default"><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Shopping Cart</a></button>
            </div>
            <div class="col-md-2">
            <div class="panel panel-default">
             <table class="table table-condensed " id="saves">
                    <tr><th class="info"><a href="#">Saves</a></th></tr>
            <?php
                $sql2 = 'select o.DateCreated from orderdetails as od, orders as o where od.orderid=o.orderid and od.ArtWorkID='.$ArtWorkID;
                 $retval1 = mysql_query( $sql2, $conn );
                    while($row = mysql_fetch_array($retval1, MYSQL_ASSOC)) {
                            $dates= $row['DateCreated'];
                            $dates = date_create($dates);
                            $saves = date_format($dates, 'm/d/y');
                            ?>

                            <tr><td><a href="#"><?php echo $saves?></a></td></tr>
                            <?php } ?>
                </table>
                </div>
            </div>
            </div>
            <div class="row">
               <div class="col-md-8"   id="product">
               <div class="panel panel-default">
                <table class="table">
                    <thead class="thead-default">
                    <tr class="active" >
                    <td id="table-header" colspan="2"> Product Details</td>
                    </tr>
                    </thead>
                    <tr>
                    <td><strong>Date:</strong> </td> <td><?php echo $YearOfWork?></td>
                    </tr>
                    <tr>
                    <td><strong>Medium:</strong> </td> <td><?php echo $Medium?></td>
                    </tr>
                    <tr>
                    <td><strong>Dimensions:</strong> </td> <td><?php echo $Width?>cm x <?php echo $Height?>cm</td>
                    </tr>
                    <tr>
                    <td><strong>Home:</strong> </td> <td><?php echo $Home?></td>
                    </tr>
                    <tr>
                    <td><strong>Genre:</strong> </td> <td>
                    <?php
                    $sql='SELECT DISTINCT g.GenreName FROM artists as a, artworks as aw, genres as g, subjects as s, artworkgenres as ag, artworksubjects as asub where a.ArtistID=aw.ArtistID and aw.ArtWorkID=ag.ArtWorkID and aw.ArtWorkID=asub.ArtWorkID and ag.GenreID=g.GenreID and asub.SubjectID=s.SubjectId and aw.ArtWorkID='.$ArtWorkID;
                    $retval1 = mysql_query( $sql, $conn );
                    while($row = mysql_fetch_array($retval1, MYSQL_ASSOC)) {
                            $genres=$row['GenreName'];  ?>    
                            <a href="#"><?php echo $genres?></a><br>
                            <?php } ?>
                    </td>
                    </tr>
                    <tr>
                    <td><strong>Subject:</strong> </td> <td>                    
                    <?php
                    $sql='SELECT DISTINCT s.SubjectName FROM artists as a, artworks as aw, genres as g, subjects as s, artworkgenres as ag, artworksubjects as asub where a.ArtistID=aw.ArtistID and aw.ArtWorkID=ag.ArtWorkID and aw.ArtWorkID=asub.ArtWorkID and ag.GenreID=g.GenreID and asub.SubjectID=s.SubjectId and aw.ArtWorkID='.$ArtWorkID;
                    $retval2 = mysql_query( $sql, $conn );
                    while($row = mysql_fetch_array($retval2, MYSQL_ASSOC)) {
                            $subjects=$row['SubjectName'];  ?>    
                            <a href="#"><?php echo $subjects?></a><br>
                            <?php }
                            ?>
                           </td>
                    </tr>
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"><?php echo $Title?> (<?php echo $YearOfWork?>) by <?php echo $FirstName?> <?php echo $LastName?> </h4>
            </div>
            <div class="modal-body" id="modal-body">
                <img id="image-popup" class="img-responsive img-thumbnail" src="images/art/works/medium/<?php echo $image?>.jpg">
            </div>
            <div class="modal-footer">

                    <button type="button" id="close-popup" data-dismiss="modal" class="btn btn-default">Close</button>

            </div>
        </div>
    </div>
</div>


</body>
</html>