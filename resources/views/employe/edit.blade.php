<!DOCTYPE html>
<html>
<head>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<title></title>
</head>
<body>
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Edit Employe</h4>
  </div>
  <div class="card-body">
    <form method="post" action="{{route('employe.update',$employes->id)}}" enctype="multipart/form-data">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-12">
          <label>First Name</label>
          <input type="text" class="form-control" name="first_name" id="txt_question" placeholder="Question" value="{{$employes->first_name}}">
          @error('question')
          <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
       <div class="form-row">
        <div class="form-group col-md-12">
          <label>last Name</label>
          <input type="text" class="form-control" name="last_name" id="txt_question" placeholder="Question" value="{{$employes->last_name}}">
          @error('question')
          <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label>Email</label>
          <input type="text" class="form-control" name="email" id="answer" placeholder="Answer" value="{{$employes->email}}">
          @error('answer')
          <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
       
       <div class="form-row">
        <div class="form-group col-md-12">
          <label>Mobile number</label>
          <input type="text" class="form-control" name="mobile_number" id="answer" placeholder="Answer" value="{{$employes->mobile_number}}">
          @error('answer')
          <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
       <div class="form-row">
        <div class="form-group col-md-12">
          <label>Company Name</label>
          <select name="company_id" id="company_id" class="js-states form-control select2">
                    <option value="" selected="">~~SELECTED~~</option>
                   @foreach ($companys as $company)
                <option value="{{ $company->id }}" @if($company->id == $employes->company_id) selected @endif>{{ucfirst($company->name)}}</option>
                @endforeach
                </select>    
          @error('answer')
          <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
     
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{route('company')}}" type="button" class="btn btn-danger">Cancel</a>

    </form>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script type="text/javascript">
  $('.this_destroy').on('click', function() {
    alert('sd');
            
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
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="country_id"]').on('change', function() {
        	alert('asds');
            var countryID = $(this).val();
            if(countryID) {
                $.ajax({
                    url: '/company/state/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
    });
</script>
</body>
</html>