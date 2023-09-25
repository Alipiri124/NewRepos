<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Fourth Page</title>
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- <script src="{{ asset('js/multiselect-dropdown.js')}}"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<style type="text/css">
		body{
           padding: 80px;
		}
	</style>
</head>
<body>
     <form action="<?= base_url('Tablecontroller/index') ?>" method="get" class="form-inline">
       <div class="form-group">
        <select name="searchtwo" class="form-control">
            <option value="" disabled selected>Choose currency</option>
            <?php foreach ($currencies as $currency): ?>               
               <option value="<?php echo $currency->id; ?>"><?php echo $currency->name; ?></option>
            <?php endforeach; ?>    
        </select>
        <select name="searchone" class="form-control mx-2">
            <option value="" disabled selected>Choose payment type</option>
            <?php foreach ($payment_types as $payment_type): ?>               
               <option value="<?php echo $payment_type->id; ?>"><?php echo $payment_type->name; ?></option>
            <?php endforeach; ?>    
        </select>
        <input type="date" name="start_date" class="form-control">
        <input type="date" name="end_date" class="form-control mx-2">
       </div>
       <button class="btn btn-primary" type="submit">Search</button>
       <a href="/Tablecontroller" class="btn btn-info mx-2">Reset</a>
     </form>
  <table class="table mt-4">
  <thead>
    <tr>      
      <th>Kategoriya adi</th>      
      <th>Rəy</th>
      <th>Məxaric</th>
      <th>Mədaxil</th>            
    </tr>
  </thead>
  <tbody>  
     <?php foreach ($payments as $payment): ?>
    <tr>        
        <td><?php
                foreach ($payment_types as $payment_type) {
                if ($payment_type->id == $payment->category_id) {
                    echo $payment_type->name;
                    break;
                }
            }?>                
        </td>
        <td><?php echo $payment->feedback; ?></td>
        <td>
             <?php
            if ($payment->payment_type === 'payout') {
                echo $payment->amount." ";
                foreach ($currencies as $currency) {
                if ($currency->id == $payment->currency_id) {
                    echo $currency->name;
                    break;
                }
               }
            }else{
                echo ' ';
            }
            ?>                
        </td> 
        <td><?php
            if ($payment->payment_type === 'payin') {
                echo $payment->amount." ";
                foreach ($currencies as $currency) {
                if ($currency->id == $payment->currency_id) {
                    echo $currency->name;
                    break;
                }
               }
            }else{
                echo ' ';
            }
            ?> 
        </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<a href="/paymentcontroller" class="btn btn-info mt-5">Öncəki səhifə</a>
<a href="/TableAjaxcontroller" class="btn btn-primary mt-5">With Ajax</a>
</body>
</html>