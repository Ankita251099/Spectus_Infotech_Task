<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.card-1 {
  padding: 10px 10px 10px 10px;
  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
}
  </style>
</head>
<body>

<div class="container">
<div class="row">
	<div>	
	  <div class="card card-1  text-md-center mb-5" id="card1">
	  <a href="{{route('company')}}"class="btn btn-primary me-2" type="button">Company </a>
	  <a href="{{route('employe')}}"class="btn btn-primary me-2" type="button">Employe </a>

	</div>
</div>
</div>
</div>
</body>
</html>