<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Fourth Page</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
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
     <form id="form" class="form-inline">
       <div class="form-group">
        <select name="searchtwo" class="form-control" id="selecttwo">               
        </select>
        <select name="searchone" class="form-control mx-2" id="select">                 
        </select>
        <input type="date" name="start_date" class="form-control">
        <input type="date" name="end_date" class="form-control mx-2"> 
       </div>
       <button class="btn btn-primary" type="submit">Search</button>
       <a href="/TableAjaxcontroller" class="btn btn-info mx-2">Reset</a>
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

  </tbody>
</table>
<a href="/paymentcontroller" class="btn btn-info mt-5">Öncəki səhifə</a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
       function allData(){
      $.ajax({
        type: "GET",
        dataType:"json",
        url: "/TableAjaxcontroller/indexData",
        success:function(response){
            var data = ""
            $.each(response.payment,function(key, value){
              data = data + "<tr>"
              data = data + "<td>"+value.payment_type_name+"</td>"
              data = data + "<td>"+value.feedback+"</td>"
              if (value.payment_type === 'payout') {
                data = data + "<td>" + value.amount + " " + value.currency_name + "</td>";
              } else {
                    data = data + "<td></td>";
              }
              if (value.payment_type === 'payin') {
                data = data + "<td>" + value.amount + " " + value.currency_name + "</td>";
              } else {
                    data = data + "<td></td>";
              }
              data = data + "</td>"
              data = data + "</tr>"
            })
            $('tbody').html(data);
        }
      })
    }
    allData(); 

    function allDataselect() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/TableAjaxcontroller/indexData",
        success: function(response) {
            var select = $('#select'); 
            select.empty();           
            select.append('<option value="" disabled selected>Choose payment type</option>');            
            $.each(response.payment_types, function(key, value) {
                var option = $('<option></option>'); 
                option.val(value.id); 
                option.text(value.name); 
                select.append(option); 
            });
        }
    });
}
allDataselect();
function allDataselecttwo() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/TableAjaxcontroller/indexData",
        success: function(response) {
            var select = $('#selecttwo'); 
            select.empty();           
            select.append('<option value="" disabled selected>Choose currency</option>');            
            $.each(response.currencies, function(key, value) {
                var option = $('<option></option>'); 
                option.val(value.id); 
                option.text(value.name); 
                select.append(option); 
            });
        }
    });
}
allDataselecttwo();

function allDataTable() {
    $("#form").submit(function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'TableAjaxcontroller/indexsearch',
            type: "GET",
            data: formData,
            dataType: "json", 
            success: function(response) {
                var data = "";
                $.each(response.searchone, function(key, value) {
                    data += "<tr>";
                    data = data + "<td>"+value.payment_type_name+"</td>"                   
                    data = data + "<td>"+value.feedback+"</td>"
                    if (value.payment_type === 'payout') {
                        data = data + "<td>" + value.amount + " " + value.currency_name + "</td>";
                      } else {
                            data = data + "<td></td>";
                      }
                    if (value.payment_type === 'payin') {
                        data = data + "<td>" + value.amount + " " + value.currency_name + "</td>";
                    } else {
                        data = data + "<td></td>";
                    }
                       data += "</tr>";
                });
                $('tbody').html(data);
            }
        });
    });
}
allDataTable();
function allDataTabletwo() {
    $("#form").submit(function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'TableAjaxcontroller/indexsearchtwo',
            type: "GET",
            data: formData,
            dataType: "json", 
            success: function(response) {
                var data = "";
                $.each(response.searchtwo, function(key, value) {
                    data += "<tr>";
                    data = data + "<td>"+value.payment_type_name+"</td>"                   
                    data = data + "<td>"+value.feedback+"</td>"                    
                    if (value.payment_type === 'payout') {
                       data = data + "<td>" + value.amount + " " + value.currency_name + "</td>";
                    } else {
                        data = data + "<td></td>";
                    }
                    if (value.payment_type === 'payin') {
                        data = data + "<td>" + value.amount + " " + value.currency_name + "</td>";
                    } else {
                        data = data + "<td></td>";
                    }
                      data = data + "</td>"
                      data = data + "</tr>"
                });
                $('tbody').html(data);
            }
        });
    });
}
allDataTabletwo();
function searchDateTable() {
    $("#form").submit(function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'TableAjaxcontroller/searchdate',
            type: "GET",
            data: formData,
            dataType: "json", 
            success: function(response) {
                var data = "";
                $.each(response.date, function(key, value) {
                    data += "<tr>";
                    data = data + "<td>"+value.payment_type_name+"</td>"                   
                    data = data + "<td>"+value.feedback+"</td>"
                    if (value.payment_type === 'payout') {
                        data = data + "<td>" + value.amount + " " + value.currency_name + "</td>";
                      } else {
                            data = data + "<td></td>";
                      }
                    if (value.payment_type === 'payin') {
                        data = data + "<td>" + value.amount + " " + value.currency_name + "</td>";
                    } else {
                        data = data + "<td></td>";
                    }
                       data += "</tr>";
                });
                $('tbody').html(data);
            }
        });
    });
}
searchDateTable();
</script>
</body>
</html>