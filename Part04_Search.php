<?php 
include 'NavigationHeader.php'; 
?>
   <script type="text/javascript">

   $(document).ready(function(){
   
      $('#desc').click(function(){
         if ($(this).is(':checked')) {
              $('#description').removeClass('hidden');
              $('#title-text').addClass('hidden');
              $('#title-text').val(' ');
            }
      });

            $('#title').click(function(){
                  if ($(this).is(':checked')) {
                         $('#title-text').removeClass('hidden');
                         $('#description').addClass('hidden');
                         $('#description').val(' ');
                   }
             });
            $('#all').click(function(){
                  if ($(this).is(':checked')) {
                        $('#title-text').addClass('hidden');
                         $('#description').addClass('hidden');
                         $('#title-text').val(' ');
                         $('#description').val(' ');
                   }
             });
            $('#filter-button').click(function(e){
              e.preventDefault();
                $.ajax({
                  type: "POST",
                  url: 'search.php',
                  data: $('#searchform').serialize()
                })
                .done(function(response){
                       $('#result-div').html(response);
                })
                

                
            });
             
       });


   </script>


<div class="container">
    <div class="page-header">
            <h2>Search Results</h2>
    </div>
    <div class="jumbotron" id="filter-box">
        <div class="container">
                <div class="form-group">
                    <form id="searchform" method="post"> 
                    <div class="radio">
                        <label><input type="radio" name="filter" id="title" checked="checked" value="checked-title">Filter by Title</label>
                    </div>
                    <input type="text" class="form-control" id="title-text" name="text_to_search">
                    <div class="radio">
                        <label><input type="radio" name="filter" id="desc" value="checked-description">Filter by Description</label>
                    </div>
                    <input type="text" class="form-control hidden" id="description" name="description_to_search">
                    <div class="radio">
                        <label><input type="radio" name="filter" id="all" value="checked-all">No Filter (show all art works)</label>
                    </div>
                    <button type="submit" class="btn btn-primary" id="filter-button" name="filter-button" value="filter-button" > Filter</button> 
                    </form>                   
                </div>
        </div>
    </div>
</div>


<div class="container" id="result-div">
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
  <?php
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

          
?>

</div>


</body>
</html>