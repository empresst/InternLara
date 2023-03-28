<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Intern Assessment</title>
	<link rel="stylesheet"  href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body>

	<div class="bg-dark py-3">
		<div class ="container">
			<div class="h4 text-white">Intern Assessment</div>
		</div>
	</div>

	<div class="container">
		<div class="d-flex justify-content-between py-3">
			<div class="h5">Create Interns</div>
			<div>
				<a href="{{route('interns.index')}}" class="btn btn-primary">See list</a>
			</div>
		</div>
	

	<form action="{{route('interns.store')}}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="card border-0 shadow-lg">
			<div class="card-body">
			
      			<div class="form-group row mt-3">
				    <div class="col-md-3">
				        <label for="name" class="form-label">Name:</label>
				    </div>
				    <div class="col-md-6">
				        <input type="text" name="name" placeholder="Enter your Name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
				        @error('name')
				        <p class="invalid-feedback">{{ $message }}</p> 
				        @enderror
				    </div>

				</div>

				<div class="form-group row mt-3">
				    <div class="col-md-3">
				        <label for="email" class="form-label">Email:</label>
				    </div>
				    <div class="col-md-6">
				        <input type="text" name="email" placeholder="Enter your Email" class="form-control @error('email') is-invalid @enderror"value="{{old('email')}}">
				         @error('email')
				        <p class="invalid-feedback">{{ $message }}</p> 
				        @enderror
				    </div>
				</div>

				<div class="form-group row mt-3">
				    <div class="col-md-3">
				        <label for="image" class="form-label">Image:</label>
				    </div>
				    <div class="col-md-6">
				        <input type="file" name="image" class="@error('image') is-invalid @enderror">
				        @error('image')
				        <p class="invalid-feedback">{{ $message }}</p> 
				        @enderror

				    </div>
				</div>
				

				<div class="form-group row mt-3">
				    <div class="col-md-3">
				        <label for="gender" class="form-label">Gender:</label>
				    </div>
				    <div class="col-md-6">
				        <input type="radio" name="gender" value="male"> Male
						<input type="radio" name="gender" value="female"> Female

				    </div>
				</div>


		  <fieldset >
			<style>
			.column {
			  float: left;
			  width: 50%;
			}

			/* Clear floats after the columns */
			.row:after {
			  content: "";
			  display: table;
			  clear: both;
			}
		  	</style>
		  	<div class="form-group row mt-3">
				    <div class="col-md-3">
		    			<legend class="h5 mt-3">Skills</legend>
					</div>
			<div class="col-md-3">
		    <div class="row">
		    	<div class="column">
		    <div>
		      <label>
		        <input type="checkbox" id="coding" name="interest[]" value="Laravel" />
		        Laravel
		      </label>
		    </div>
		    <div>
		      <label>
		        <input type="checkbox" id="music" name="interest[]" value="Ajax" />
		        Ajax
		      </label>
		    </div>
		    <div>
		      <label>
		        <input type="checkbox" id="art" name="interest[]" value="MySQL" />
		        MySQL
		      </label>
		    </div>
		</div>
		<div class="column">
		    <div>
		      <label>
		        <input type="checkbox" id="sports" name="interest[]" value="CodeIgniter" />
		        CodeIgniter
		      </label>
		    </div>
		    <div>
		      <label>
		        <input type="checkbox" id="cooking" name="interest[]" value="Vue JS" />
		        Vue JS
		      </label>
		    </div>

		    <div>
		      <label>
		        <input type="checkbox" id="cooking" name="interest[]" value="API" />
		        API
		      </label>
		    </div>

		    </div>
		    </div>
		  </fieldset>


				</div>
				
			</div>
		
		<button class="btn btn-primary mt-3">Submit</button>
	</form>
	</div>
</div>

</body>
</html>