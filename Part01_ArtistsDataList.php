<?php include 'NavigationHeader.php'; ?>

<div class="container">
  <div class="page-header">
      <h2>Artists Data List (Part 01)</h2>
  </div>

        <?php
           $dbhost = 'localhost';
           $dbuser = 'root';
           $dbpass = 'root';
           
           $conn = mysql_connect($dbhost, $dbuser, $dbpass);
           
           if(! $conn ) {
              die('Could not connect: ' . mysql_error());
           }
           
           $sql = 'SELECT ArtistID, FirstName, LastName, YearOfBirth, YearOfDeath FROM artists order by LastName ASC ';
           mysql_select_db('art');
           $retval = mysql_query( $sql, $conn );
           
           if(! $retval ) {
              die('Could not get data: ' . mysql_error());
           }
           echo '<form>';
           while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
              echo "<a href='Part02_SingleArtist.php?id={$row['ArtistID']}' id='{$row['ArtistID']}' class='artist'> {$row['FirstName']} {$row['LastName']} ( {$row['YearOfBirth']} - {$row['YearOfDeath']} )</a><br> ";
           }
           echo "</form>";
            mysql_close($conn);
        ?>
</div>
</body>
</html>