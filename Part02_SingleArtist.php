        <?php
          include 'NavigationHeader.php'; 
           $dbhost = 'localhost';
           $dbuser = 'root';
           $dbpass = 'root';
           
           $conn = mysql_connect($dbhost, $dbuser, $dbpass);
           
           if(! $conn ) {
              die('Could not connect: ' . mysql_error());
           }
           $ArtistID=$_GET['id'];
           $sql = 'SELECT * FROM artists AS a WHERE a.ArtistID='.$ArtistID;
           mysql_select_db('art');
           $retval = mysql_query( $sql, $conn ); 
             if (mysql_num_rows($retval) == 0){
                    header("Location:Error.php");
                    exit;
                }      
           while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {

              $firstname=$row['FirstName'];
              $lastname=$row['LastName'];
              $description=$row['Details'];
              $yearofbirth=$row['YearOfBirth'];
              $yearofdeath=$row['YearOfDeath'];
              $nationality=$row['Nationality'];
              $info=$row['ArtistLink'];
            }
            $sql1 = 'SELECT * FROM artists AS a, artworks AS aw WHERE  a.ArtistID=aw.ArtistID AND a.ArtistID='.$ArtistID;
           
            $retval1 = mysql_query( $sql1, $conn );

              ?>
<div class="container">
    <h2><?php echo $firstname; ?> <?php echo $lastname; ?></h2>

    <div class="row">
        <div class="col-md-4">
        <img src="images/art/artists/medium/<?php echo $ArtistID; ?>.jpg"  class = "img-thumbnail">
        </div>
        <div class="col-md-8">
            <div class="row">
              <div class="col-md-8">
                <p><?php echo $description; ?></p>
                <button class="btn btn-default"><a href="#"><span class="glyphicon glyphicon-heart"></span> Add to Favorites List</a></button>
              </div>
            </div>
              <div class="row" id="artist-details-div">
                <div class="col-md-8 "> 
                <div class="panel panel-default">          
                  <table class="table">
                      <thead class="thead-default">
                      <tr class="active">
                      <td  id= "table-header" colspan="2">Artist Details</td>
                      </tr>
                      </thead>
                      <tr>
                          <td><strong>Date: </strong></td>
                          <td><?php echo $yearofbirth; ?> - <?php echo $yearofdeath; ?></td>
                      </tr>
                      <tr>
                          <td><strong>Natioanlity: </strong></td>
                          <td><?php echo $nationality; ?></td>
                      </tr>
                      <tr>
                          <td><strong>More Info: </strong></td>
                          <td><a href="<?php echo $info; ?>"><?php echo $info; ?></a></td>
                      </tr>
                  </table>
                  </div>
                </div>

            </div>
        </div>
        </div>
          </div>
          <div class= "container">
          <h2 class="page-header">Art By <?php echo $firstname; ?> <?php echo $lastname; ?> </h2>
                 <?php

                  while($row = mysql_fetch_array($retval1, MYSQL_ASSOC)) {
                          $image=$row['ImageFileName']; 
                          $title=$row['Title'];
                          $yearofwork=$row['YearOfWork'];
                          $Artid=$row['ArtWorkID'];?>
                         <div class="col-xs-18 col-sm-6 col-md-3">
                              <div class="thumbnail">
                                  <img class = "img-thumbnail" src="images/art/works/square-medium/<?php echo $image.'.jpg' ?>" >
                                    <div class="caption">
                                      <p class="title"><a href="Part03_SingleWork.php?id=<?php echo $Artid?>" ><?php echo $title?><?php echo $yearofwork?></a></p>
                                      <p class="thumb-button"><a href="Part03_SingleWork.php?id=<?php echo $Artid?>" class="btn btn-primary btn-sm" role="button"><span class="glyphicon glyphicon-info-sign"></span> View</a>  <a href="#" class="btn btn-success btn-sm" role="button"><span class="glyphicon glyphicon-gift"></span> Wish</a>  <a href="#" class="btn btn-info btn-sm" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></p>
                                    </div>
                              </div>
                         </div>
                          <?php }
                 ?>


          </div>
</body>
</html>