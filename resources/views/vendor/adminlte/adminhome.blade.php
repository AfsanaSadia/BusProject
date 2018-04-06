@extends('adminlte::layouts.app')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection
<style> 

div.b {
    white-space: nowrap; 
    width: 10px; 
    overflow: hidden;
    text-overflow: ellipsis; 
    border: 0px solid #000000;
}

</style>
@section('main-content')
	<div class="container-fluid spark-screen">

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				
	<?php
$connect = mysqli_connect("localhost", "root", "", "admin");
$query = "SELECT * FROM booking ORDER BY id DESC";
$result = mysqli_query($connect, $query);
?>				

			<div style="background:yellow;"align="center">
        <h1>Welcome User</h1>
        </div>
												
<!------ Include the above in your HEAD tag ---------->

    <div class="container">    
        <div id="loginbox" style="margin-top:50px;margin-right:35%;" >                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">BOOK TICKET</div>
                                            </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                           
<form action="events.php" method="post">
     <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><label for="text">BUYER NAME</label></span>
<input type="text" class="form-control"  id="title" name="title" required="">
</div>  
<div style="margin-bottom: 25px" class="input-group"> 
<span class="input-group-addon"><label for="text">TIME</label></span>
<input type="text" id="body" class="form-control"  name="body" required=""></input>
</div> 
     <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><label for="text">TICKET PRICE</label></span>
<input type="text" class="form-control"  id="url" name="url" required="">
</div> 
<button type="submit" name="event_btn" class="btn btn-success">BOOK TICKET</button>
</form>    



                        </div>                     
                    </div>  
        </div>
       </div>
		
		
				
			</div>
		</div>
			<div class="container">  
   <br />  
   <br />  
   <br />  
            <div class="table-responsive">  
    <h3 align="center">Visitor Box</h3><br />  
    <table id="editable_table" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>BUS ID</th>
       <th>BUYER NAME</th>
       <th>TIME</th>
	    <th>TICKET PRICE</th>
      </tr>
     </thead>
     <tbody>
    
   
 <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["id"].'</td>
       <td>'.$row["title"].'</td>
       <td>'.$row["body"].'</td>
	    <td><div class="b">'.$row["url"].'</div></td>
	   	        </tr>
			
      ';
     }
     ?>
     </tbody>
    </table>
	
   </div>  
  </div>   
	</body>   
<script>  
( function($) {
$(document).ready(function(){  
     $('#editable_table').Tabledit({
      url:'event.php',
      columns:{
       identifier:[0, "id"],
       editable:[[1, 'title'], [2, 'body'], [3, 'url']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();
       }
      }
     });
 
});  } ) ( jQuery );
 </script>
	</div>
	<body> 


@endsection
