<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<div class="container">
<div class="row">
	<div class="row pb-2">
     
      <div class="col-12">                   
        <a href="{{route('company.create')}}" type="button" style="float: right;" class="btn btn-primary ">Add Company</a>
      </div>
    </div>
	<table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Logo</th>
          <th scope="col">Website</th>
          <th scope="col">Address</th>
          <th scope="col">Country</th>
          <th scope="col">State</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
      <tbody>
        @php
          $no=1
        @endphp
       @if(!empty($companys) && $companys->count())
        @foreach($companys as $company)
        <tr>
          <th scope="row">{{$no}}</th>
          <td>{{$company->name}}</td>
          <td>{{$company->email}}</td>
          <td>{{$company->logo}}</td>
          <td>{{$company->website}}</td>
          <td>{{$company->address}}</td>
          <td>
            @if(!is_null($company->countryname))
            {{$company->countryname->name}}
            @else
            @endif
          </td>
          <td>
             @if(!is_null($company->statename))
            {{$company->statename->name}}
            @else
            @endif
          </td>
          <td>
            <a class="badge badge-success shadow-success" href="{{route('company.edit',$company->id)}}" 
                                            >
                                             <i class="fa fa-pencil-square" ></i> </a>
                                             <a class="badge badge-danger shadow-danger this_destroy"  data-url="{{route('company.delete',$company->id)}}" ><i class="fa fa-trash"></i> </a>
          </td>
        </tr>
        @php
          $no++
        @endphp
        @endforeach
        @else
        <td colspan="12" class="text-center">No Record Found</td>
        @endif

      </tbody>
      
    </table>
    {!! $companys->links() !!}
</div>
</div>

</body>
</html>