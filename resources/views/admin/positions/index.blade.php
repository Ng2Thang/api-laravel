@extends('layouts.main')
@section('content')

<div class="row">
		<div class="col-md-10">
			<h1>List Position</h1>
		</div>

		<div class="col-md-2">
			<a href="{{route('admin.positions.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- end of .row -->

	<div class="row">
		

		<div class="col-md-12">
			History
			<table class="table">
				<thead>
					<th>#</th>
					<th>Name</th>
					<th>Created At</th>
					
					<th>Options</th>
					
				</thead>

				<tbody>
					<?php $i=1 ?>
					@foreach ($positions as $position)
						
						<tr>
							<th>{{ $i }}</th>
							<th style="color: red;font-weight: bold">{{ $position->name }}</th>
							<td>{{ $position->created_at }}</td>
							
							<td>
								
                    	<a href="admin/positions/{{$position->id}}"><button class="btn btn-warning btn-sm">Edit</button></a>
                    	<a href=""><button class="btn btn-danger btn-sm">Delete</button></a>
							</td>
							
						</tr>
				<?php $i++ ?>
					@endforeach

				</tbody>
			</table>

			
		</div>
	</div>
	<script>

</script>
@endsection
