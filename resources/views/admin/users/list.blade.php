@extends('admin.layouts.app')
@push('styles')
<link href="{{asset('/assets/admin/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />

<style media="screen">
.adjust-delete-button {
  margin-top: -28px;
  margin-left: 37px;
}
</style>
@endpush
@section('content')

<div class="page-heading">
    <h1 class="page-title">Users</h1>
    <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href=""><i class="la la-home font-20"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item"> All News</li>
    </ol> -->
@include('admin.layouts._partials.messages.info')
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All users</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('users.create')}}">Add users</a>
            </div>
        </div>


        <div class="ibox-body">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>SN</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Published</th>
                      <th>Options</th>
                    </tr>
                </thead>
                <tbody>

                  @if($details->count())
                    @foreach($details as $key => $data)

                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{$data->address}}</td>
                      <td>{{$data->status}}</td>

                        <td>
                            <a href="{{route('users.edit', $data->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>

                              <form class="adjust-delete-button" action="{{route('users.destroy', $data->id)}}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this users?')"><i class="fa fa-trash"></i></button>
                              </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8">
                            You do not have any data yet.
                        </td>
                    </tr>
                    @endif
                </tbody>

            </table>
        </div>
    </div>

</div>

@endsection
@push('scripts')
<script src="{{asset('/assets/admin/vendors/DataTables/datatables.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $('#example-table').DataTable({
            pageLength: 25,

        });
    })
</script>
@endpush
