@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Blogs
                    <div style="float: right;">
                    <span><a class="btn btn-success" href="{{ url('addblog') }}"> <i class="fa fa-plus"></i> &nbsp; Add Blog</a></span>
                </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     @if(count($commissions))
              <table class="table">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Like </th>
                    <th>Created At</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody> 
                @foreach($commissions as $key => $commission)
                  
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $commission->title }}</td>
                    <td>{{ $commission->description }}</td>
                    <td><img src="{{ $commission->image }}" width="150px" height="100px" /></td>
                    <td>{{ $commission->created_at }}</td>
                    <td><a href="#" data='{{ $key+1 }}'  onclick="likeajax({{ $commission->id }})" >Like</a>
                      <br />
                      <span id="like_status" style="color: green;"></span>
                    </td>
                    <td>
                      <a href="{{ url('editblog', Crypt::encrypt($commission->id)) }}" class="btn btn-info">View / Edit</a>
                      <a href="{{ url('deleteblog', Crypt::encrypt($commission->id)) }}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              {{ $commissions->links() }}
              @else
                {{ 'No Blog Found' }}
              @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
    function likeajax(id) {
      alert(id);
    $.ajax({
      url: '{{ url("ajaxlike") }}',
      type: 'POST',
      data: {
        "_token": "{{ csrf_token() }}",
        "id": id,
      
      }, 
      beforeSend: function() {
      },
      success: function (data) {
         $("#like_status").html(data.success);
            setTimeout(function(){// wait for 5 secs(2)
           location.reload(); // then reload the page.(3)
      }, 3000);
     
      },
      error: function (data) {
        return false;
      }
    }); 
  }
</script>
