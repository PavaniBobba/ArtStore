<?php
//function onSearch(){
  //alert("in fun");
$sql=" ";
$searchtext=" ";
$filter=" ";
if(isset($_POST['filter'])){
    $filter=$_POST['filter'];

          $dbhost = 'localhost';

           $dbuser = 'root';
           $dbpass = 'root';
           
           $conn = mysql_connect($dbhost, $dbuser, $dbpass);
           
           if(! $conn ) {
              die('Could not connect: ' . mysql_error());
           }
           if($filter=='checked-title'){
                $searchtext=$_POST['text_to_search'];
               $sql = "SELECT * FROM artists as a, artworks as aw where a.ArtistID=aw.ArtistID and aw.Title like '%$searchtext%'"; 
           }
           if($filter=='checked-description'){
              $searchtext=$_POST['description_to_search'];
              $sql = "SELECT * FROM artists as a, artworks as aw where a.ArtistID=aw.ArtistID and aw.Description like '%$searchtext%'"; 
           }
           if($filter=="checked-all"){
            //echo "all";
              $sql = "SELECT * FROM artists as a, artworks as aw where a.ArtistID=aw.ArtistID";
           }

           
           mysql_select_db('art');
           $retval = mysql_query( $sql, $conn );
           
           if(! $retval ) {
              die('Could not get data: ' . mysql_error());
           }
           
           while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
              $Title=$row['Title'];
              $Description=$row['Description'];
              $image=$row['ImageFileName'];
              $ArtWorkID=$row['ArtWorkID']
              ?>
              <div class="row" id="search-results">
                  <div class="col-md-2">
                        <a href="Part03_SingleWork.php?id=<?php echo $ArtWorkID;?>" ><img class = "img-thumbnail" src="images/art/works/square-medium/<?php echo $image?>.jpg"></a>
                 </div>
                  <div class="col-md-8">
                      <p><a href='Part03_SingleWork.php?id=<?php echo $ArtWorkID?>' > <?php echo $Title ?></a></p>
                      <p><?php echo highlight($Description, $searchtext) ?> </p>
                  </div>
              </div>
              <?php
           
            }
          }
        //}
          
?>
  <?php
function highlight($text, $words, $color='yellow', $case='1') { 
 $words = trim($words); 
 $wordsArray = explode(' ', $words); 
 
 foreach($wordsArray as $word) { 
  if(strlen(trim($word)) != 0) 
   if ($case) {
    $text = eregi_replace($word, '<font style="background:' . $color . '";>\\0</font>', $text);
     } else {
    $text = ereg_replace($word, '<font style="background:' . $color . '";>\\0</font>', $text); 
   }
  } 
 return $text; 
} 
?>