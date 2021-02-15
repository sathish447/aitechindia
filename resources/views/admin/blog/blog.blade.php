@extends('layouts.header')
@section('title', 'Commission Settings')
@section('content')
<section class="content">
  <div class="content__inner">
    <header class="content__title">
    </header>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
          <h4 class="card-title">Blog Settings </h4>
          <!-- <a href="{{ url('admin/blognew') }}" class="btn btn-info" style="float: right; margin-top: -50px;">ADD</a> -->
            <div class="table-responsive">

                @if(session('status'))
  <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Success!</strong> {{ session('status') }}
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
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody> 
                @foreach($commissions as $key => $commission)
                    @if($commission->type == 'coin')
                        @php $decimal = 5; @endphp
                    @else
                        @php $decimal = 2; @endphp
                    @endif
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $commission->title }}</td>
                    <td>{{ $commission->description }}</td>
                    <td><img src="{{ url($commission->image) }}" width="150px" height="100px" /></td>
                    <td>{{ $commission->created_at }}</td>
                    <td>@if($commission->status == 1) Active @else In Active @endif</td>
                    <td>
                      <a href="{{ url('/admin/blogsettings', Crypt::encrypt($commission->id)) }}" class="btn btn-info">View / Edit</a>
                      <a href="{{ url('/admin/blogdelete', Crypt::encrypt($commission->id)) }}" class="btn btn-danger">Delete</a>
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
  </section>
@endsection