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
			<div class="h5">Interns</div>
			<div>
				<a href="{{route('interns.create')}}" class="btn btn-primary">Create</a>
			</div>
		</div>
	
		@if(Session::has('success'))
		<div class="alert alert-success"> 
			{{Session::get('success')}}
		</div>
		@endif

	<div class="card border-0 shadow-lg">
		<div class="card-body">
			<table class="table table-striped">
				<tr >
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Gender</th>
					<th>Image</th>
					<th>skill</th>
					<th>Action</th>
				</tr>

				@if($interns->isNotEmpty())
                @foreach ($interns as $intern)

				<tr valign="middle">
					<td>{{$intern->id}}</td>
					<td>{{$intern->name}}</td>
					<td>{{$intern->email}}</td>
					<td>{{$intern->gender}}</td>
					<td>
                            @if($intern->image != '' && file_exists(public_path().'/uploads/interns/'.$intern->image))
                            <img src="{{ url('uploads/interns/'.$intern->image) }}" alt="" width="40" height="40" class="rounded-circle">
                            @else
                            <img src="{{ url('assets/images/no-image.png') }}" alt="" width="40" height="40" class="rounded-circle">
                            @endif
                        </td>
					<td>{{$intern->skill}}</td>
					
					
					<td>
						<a href="{{ route('interns.edit',$intern->id) }}" class="btn btn-primary btn-sm">Edit</a>
						<a href="#" onclick="deleteIntern({{ $intern->id }})" class="btn btn-danger btn-sm">Delete</a>
						<form id="intern-edit-action-{{ $intern->id }}" action="{{ route('interns.destroy',$intern->id) }}" method="post">
                                @csrf
                                @method('delete')
                        </form>
					</td>
				</tr>
				@endforeach
				@else
                    <tr>
                        <td colspan="6">Record Not Found</td>
                    </tr>
                 @endif
			</table>
		</div>
	</div>
	<div class="mt-3">
            {{ $interns->links() }}
        </div>

	</div>
</body>
</html>
<script>
    function deleteIntern(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('intern-edit-action-'+id).submit();
        }
    }
</script>