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
    <h4 class="card-title">Add Employe</h4>
  </div>
  <div class="card-body">
    <form method="post" action="{{route('employe.add')}}">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-12">
          <label>First Name</label>
          <input type="text" class="form-control" name="first_name" id="txt_question" placeholder="Question">
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
          <input type="text" class="form-control" name="last_name" id="txt_question" placeholder="Question">
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
          <input type="text" class="form-control" name="email" id="answer" placeholder="Answer">
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
          <input type="text" class="form-control" name="mobile_number" id="answer" placeholder="Answer">
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
                <option value="{{ $company->id }}">{{ucfirst($company->name)}}</option>
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