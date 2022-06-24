<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<div class="container">
<div class="row">
	<div class="row pb-2">
    <div class="col-md-6">
      
     <select class="form-control" id="company_name"  >
                <option value="">~Select User~</option>
                    @foreach ($companys as $company)
              <option value="{{$company->id}}">{{$company->name}}</option>
              @endforeach
              </select>
    </div>
    <div class="form-group col-md-2">
                      
                  <button type="button" class="btn btn-danger btn-lg filter">Search</button>
                    </div>
      <div class="col-12">                   
        <a href="{{route('employe.create')}}" type="button" style="float: right;" class="btn btn-primary ">Add Employe</a>
      </div>
    </div>
	<div class="employe_table">
                      @include('employe.employetable')
                    </div>
</div>
</div>
<input type="hidden" name="company_name" id="company_name" >

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    // alert('sds');
 $('.this_destroy').on('click', function() {
            alert('sdasd');
            let del_url = $(this).attr('data-url');

            bootbox.confirm({
                message: "Are you sure to delete? ",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function(result) {
                    if(result){
                        location.replace(del_url);
                    }
                }
            });
        })
  });

   $('.company_name').on('change',function()
{
   var data = $(this).val();
    alert(data);
    $("#company_name").val(data);

});

 $('.filter').on('click', function() {
  alert('sdsa');

  var data = $("#status_value").val();

        $.ajax({
            type: "GET",
            url: "{{ route('searchcompany') }}",
            data: {
              "data":data,
            },        
            success: function (data)
            {          
            $('.employe_table').html(data.data);
               $('#example').DataTable();
               
                }

                });
});




</script>
</body>
</html>