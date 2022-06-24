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
    <h4 class="card-title">Edit Company</h4>
  </div>
  <div class="card-body">
    <form method="post" action="{{route('company.update',$companys->id)}}" enctype="multipart/form-data">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-12">
          <label>Company Name</label>
          <input type="text" class="form-control" name="name" id="txt_question" placeholder="Question" value="{{$companys->name}}">
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
          <input type="text" class="form-control" name="email" id="answer" placeholder="Answer" value="{{$companys->email}}">
          @error('answer')
          <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
       <div class="form-row">
        <div class="form-group col-md-12">
          <label>Logo</label>
          <input type="file" class="form-control" name="logo" id="answer" placeholder="Answer" >
          @error('answer')
          <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
       <div class="form-row">
        <div class="form-group col-md-12">
          <label>Website</label>
          <input type="text" class="form-control" name="website" id="answer" placeholder="Answer" value="{{$companys->website}}">
          @error('answer')
          <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
       <div class="form-row">
        <div class="form-group col-md-12">
          <label>Address</label>
          <textarea class="form-control" name="address">{{$companys->address}}</textarea>
          @error('answer')
          <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
       <div class="form-row">
        <div class="form-group col-md-12">
          <label>Country Name</label>
          <select name="country_id" id="country_id" class="js-states form-control select2">
                    <option value="" selected="">~~SELECTED~~</option>
                   @foreach ($countrys as $country)
                <option value="{{ $country->id }}" @if($country->id == $companys->country_id) selected @endif>{{ucfirst($country->name)}}</option>
                @endforeach
                </select>    
          @error('answer')
          <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
       <div class="form-row">
        <div class="form-group col-md-12">
          <label>State Name</label>
         <select name="state_id" id="state_id" class="js-states form-control select2">
                 
                    <option value="" >~~SELECTED~~</option>
                    <option value="{{$getSeletedState->name}}" selected="">{{$getSeletedState->name}}</option>
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
 
          // alert("sadd");
           var countryID = $(this).val();
          // alert(stateID);
            if(countryID) {
                $.ajax({
                    url: "{{url('getstate')}}?countryID="+countryID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="state_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="state_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="state_id"]').empty();
            }
        });
    });
   </script>
</body>
</html>