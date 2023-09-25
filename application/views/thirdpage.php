<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Third Page</title>
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
<div class="text-center mb-5"><h1>Payment</h1></div>	
	<form id="formthird">    
    <input type="text" name="amount" required placeholder="Miqdar" id="amount" class="form-control w-25 mb-3" oninput="this.value = this.value.replace(/[^0-9]/g, '')">    
    <select name="category_id" required class="form-control w-25 mb-3">
    <?php foreach ($paymenttypes as $paymenttype): ?>
        <option value="<?php echo $paymenttype->id; ?>"><?php echo $paymenttype->name; ?></option>
    <?php endforeach; ?>
    </select> 
    <select name="currency_id" required class="form-control w-25 mb-3">
    <?php foreach ($currencies as $currency): ?>
        <option value="<?php echo $currency->id; ?>"><?php echo $currency->name; ?></option>
    <?php endforeach; ?>
    </select>    
    <select name="payment_type" required class="form-control w-25 mb-3">      
        <option value="payin">Medaxil</option>  
        <option value="payout">Məxaric</option>    
    </select>
    <input type="text" name="feedback" placeholder="Feedback" id="feedback" class="form-control w-25 mb-3"> 
    <button type="submit" class="btn btn-success">Göndər</button>
</form>
<a href="/Paymenttypecontroller" class="btn btn-info mt-5">Öncəki səhifə</a>
<a href="/Tablecontroller" class="btn btn-primary mt-5">Növbətii səhifə</a>
<script>
	$(document).ready(function(){
		function clearData()
       {
         $('#amount').val('');  
         $('#feedback').val('');       
       }

		$("#formthird").submit(function(e){
         e.preventDefault();

         var formData = $(this).serialize();

         $.ajax({
           url: 'paymentcontroller/index',
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
             title: 'Payment success',             
             }) 
            }          
         });
      });
	});
</script> 
</body>
</html>