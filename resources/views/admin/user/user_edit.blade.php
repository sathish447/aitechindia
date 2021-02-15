@extends('layouts.header')
@section('title', 'Users List - Admin')
@section('content')
<section class="content">
	<header class="content__title">
		<h1>View User Details</h1>
	</header>
	<a href="{{ url('admin/users/') }}"><i class="zmdi zmdi-arrow-left"></i> Back to Users</a>
	<br /><br />
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="tab-container">

						@if(session('updated_status'))
						<div class="alert alert-success">
							{{ session('updated_status') }}
						</div>
						@endif

						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a>
							</li>
				

						</ul>
						<div class="tab-content">
							<div class="tab-pane active fade show" id="profile" role="tabpanel">

									<form method="post" action="{{ url('admin/update_user') }}" autocomplete="off">
						{{ csrf_field() }}
						<input type="hidden" value="{{ $userdetails->id }}" name="id">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>Full Name</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" name="fname" class="form-control" value="{{ $userdetails->fname != NULL ? $userdetails->fname : '' }}"/><i class="form-group__bar"></i>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>Email ID</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input type="email" name="email" class="form-control" value="{{ $userdetails->email }}" /><i class="form-group__bar"></i>
								</div>
							</div>
						</div>
						
					
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>Phone No</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" name="phone" class="form-control" value="{{$userdetails->phone }}" /><i class="form-group__bar"></i>
								</div>

							</div>
						</div>
			
					</form>
		
							</div>
					
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	@endsection