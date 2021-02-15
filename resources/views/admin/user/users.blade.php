@extends('layouts.header')
@section('title', 'Users List - Admin')
@section('content')
<section class="content">
	<header class="content__title">
		<h1>Users</h1>
	</header>
	<div class="card">
		<div class="card-body">
	<!-- 	    <form action="{{ url('/admin/users/search') }}" method="GET" autocomplete="off">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-3">                
						<input type="text" name="searchitem" class="form-control" placeholder="Search for User Name or Email" value= "" required>
					</div>
					<div class="col-md-3">
						<input type="submit" class="btn btn-success user_date" value="Search" />
						<a class="btn btn-warning btn-xs" href="{{ url('/admin/users') }}"> Reset </a> 
					</div>
				</div>
			</form> -->
			<br/>
			<div id="sellstatus" class="alert alert-success" style="display: none;"></div>
			<div class="col-md-12 col-sm-12 col-xs-12 userexprotlet">

			@if(session('updated_status'))
			    <div class="alert alert-success">
                    {{ session('updated_status') }}
                        </div>
			@endif

			@if($details)
    			<h5> Total Users : {{ count($details) }} </h5>
    			<hr />
    		@endif

    	
		</div>
	

			<div class="table-responsive search_result">
				<table class="table" id="dows">
					<thead>
						<tr>
							<th>S No</th>
							<th>Full Name</th>
							<th>Email ID</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
					<tbody>
					 @if(count($details) > 0)
					@foreach($details as $key => $user)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $user->fname }} {{ $user->lname }}</td>
							<td>{{ $user->email }}</td>
						
							<td>
								<a class="btn btn-success btn-xs" href="{{ url('/admin/users_edit/'.Crypt::encrypt($user->id)) }}"><i class="zmdi zmdi-edit"></i> View </a>
							</td>
					
						</tr>
					@endforeach
					@else
					    <tr><td colspan="7"> No record found!</td></tr>
					@endif
					</tbody>
				</table>
				<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                <div class="pagination-tt clearfix">
                @if($details->count())
				    {{ $details->links() }}
				@endif
                </div>
              </div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	function changestatus(status,user)
	{
		$.ajax({
	      url: '{{ url("/admin/user_status") }}',
	      type: 'POST',
	      data: {
	        "_token": "{{ csrf_token() }}",
	        "status": status,
	        "user": user
	      }, 
	      success: function (data) {
	      	$('#sellstatus').html(data['message']);
	      	$("#sellstatus").attr("style", "display:block")
	        window.location.reload();
	      },
	    });
	}
</script>
@endsection


