@extends('layouts.main')
@section('content')
<?php 

function time_elapsed_string($datetime, $full = false) {
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);
	
	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'years',
		'm' => 'months',
		'w' => 'weeks',
		'd' => 'days',
		'h' => 'hours',
		'i' => 'mins',
		's' => 'seconds',
	);
	foreach ($string as $k => &$v) {
		if ($diff->$k) {
			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
		} else {
			unset($string[$k]);
		}
	}

	if (!$full) $string = array_slice($string, 0, 1);
	return $string ? implode(', ', $string) . ' ago' : 'Just Now';
}
?>
<div class="row">
		<div class="col-md-10">
			<h1>Waiting for Pending</h1>
		</div>

		<div class="col-md-2">
			<a href="/admin/lates/history"><button class="btn btn-success btn-lg btn-block" type="button"><i class="fa fa-eyes-open"></i> View History</button></a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- end of .row -->
@if(session('success'))
				
					
					<div class="alert alert-success" role="alert">
  <strong>	{{session('success')}}</a>
</div>
@endif
	<div class="row">
		<div class="col-md-12">
			Waiting
			<table class="table">
				<thead>
					<th>#</th>
					<th>User</th>
					<th>Reason</th>
					<th>Time</th>
					<th>Approved</th>
					<th>Date</th>
				</thead>

				<tbody>
					<?php $i=1 ?>
					@foreach ($lates as $late)
						
						<tr>
							<th>{{ $i }}</th>
							<th>{{ $late->user->name }}</th>
							<td>{{ $late->reason }}</td>
							<td>{{$late->time}} minute</td>
							<td>
								 <a href="/admin/lates/approved/{{$late->id}}/1"><button class="btn btn-sm btn-success">Approve</button></a>
								<a href="/admin/lates/approved/{{$late->id}}/2"><button class="btn btn-sm btn-danger">Reject</button></a>
								
							</td>
							<td><a href="#" data-toggle="tooltip" title="{{ date_format($late->created_at,"Y/m/d H:i:s")}}">{{ time_elapsed_string($late->created_at)}}</a>
			

							</td>
						</tr>
				<?php $i++ ?>
					@endforeach

				</tbody>
			</table>

			<div class="text-center">
				{!! $lates->links(); !!}
			</div>
		</div>

		
	</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
@endsection
