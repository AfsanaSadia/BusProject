                        <?php

$dbc=mysqli_connect("localhost","root","","admin");
if(isset($_POST['event_btn']))
{   $title=mysqli_real_escape_string($dbc,$_POST['title']);
    $body=mysqli_real_escape_string($dbc,$_POST['body']);
  $url=mysqli_real_escape_string($dbc,$_POST['url']);
   
            $sql="INSERT INTO booking(title,body,url) VALUES('$title','$body','$url')";
              mysqli_query($dbc,$sql);  
          header("Location: http://127.0.0.1:8000/home");
die();
  
}

?>
