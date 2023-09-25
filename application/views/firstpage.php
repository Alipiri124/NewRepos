<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>First Page</title>
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<style type="text/css">
		body{
           padding: 80px;
		}
	</style>
</head>
<body>
<div class="text-center mb-5"><h1>Currency</h1></div>	
	<form id="form" class="form-inline">		
    <div class="form-group mr-2">
        <input type="text" name="name" id="name" required placeholder="Currency" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Send</button>
</form>
<a href="/Paymenttypecontroller" class="btn btn-primary mt-5">Next Page</a>
 <script>
	$(document).ready(function(){
		function clearData()
       {
         $('#name').val('');         
       }

		$("#form").submit(function(e){
         e.preventDefault();

         var formData = $(this).serialize();

         $.ajax({
           url: 'currencycontroller/index',
           type:"POST",
           data:formData,
           success:function(response){            
              clearData();
              const Msg = Swal.mixin({
             toast: true,
             position: 'top-end',
             icon: 'success',             
             showConfirmButton: false,
             timer: 2000
             })  

             Msg.fire({
             type: 'success',
             title: 'Currency added success',             
             })                       
           }
         });
      });
	});
</script> 
</body>
</html>