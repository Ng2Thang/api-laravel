@extends('layouts.main')
@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="row">
	<div class="col-md-6 col-md-offset-2">
		<form class="form-horizontal" role="form" method="post" action="{{ route('admin.positions.create')}}">

			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<fieldset>

					<!-- Form Name -->
					<legend>CREATE A POSITION</legend>

					<!-- Text input-->
	<hr>
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif

					@if(session('success'))
					<div class="bs-component">
              <div class="alert alert-dismissible alert-success">
                <button class="close" type="button" data-dismiss="alert">×</button>
                <strong>{{session('success')}}</strong>
              </div>
            </div>
					
					@endif

					@if(session('warn'))

					<div class="alert bg-danger">
						<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
						<span class="text-semibold">Error!</span>  {{session('warn')}}
					</div>
					@endif

					
					<!-- Text input-->
					<div class="form-group">
						<label class="col-sm-4 control-label" for="textinput">Name of position</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" placeholder="Please Enter Name of Position" name="name">
						</div>
					</div>

					<!-- Text input-->


					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="pull-right">
								<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Create</button>
								<a href="/" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Back
								</a>
							</div>
						</div>
					</div>

				</fieldset>
			</form>
		</div><!-- /.col-lg-12 -->
	</div><!-- /.row -->

	<div style="height: 450px"></div>


@endsection
