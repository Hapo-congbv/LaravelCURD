@extends('admin/index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="page-header">Users
                    <small>List</small>
                    <a href="{{route('users.create')}} " class="icon-add" ><span class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> AddUser</span></a>
                </h1>
            </div>
            <div class="col-12">
                  @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">X</button>	
                            <strong>{{ $message }}</strong>
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>STT</th>
                            <th>Avatar</th>
                            <th>FullName</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $STT = 0?>  
                        @foreach ($users as $user)
                        <tr>
                            <td>{{++$STT}}</td>
                            <td class="hapo-img"><img src="{{url('storage/', $user->userImage)}}" alt="" srcset=""></td>
                            <td>{{$user->fullname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->mobile}}</td>
                            <td>
                                <!-- show -->
                                <a href data-id="{{$user->id}}" class="icon-show" data-toggle="modal" data-target="#showUser" data-id="{{$user->id}}" ><span class="btn btn-info"><i class="fas fa-user" aria-hidden="true"></i></span></a>
                                <!-- edit -->
                                <a href="{{ route('users.edit', $user->id) }}"  class="icon-edit" ><span class="btn btn-primary"> <i class="fas fa-edit" aria-hidden="true"></i></span> </a>
                                <!-- delete -->
                                <a href="{{ route('users.delete', $user->id) }}" class="icon-delete" data-title="Delete Category?" ><span class="btn btn-success"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr align="center">
                            <th>STT</th>
                            <th>Avatar</th>
                            <th>FullName</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Option</th>
                        </tr>
                    </tfoot>
                </table>
            </div> 
        </div>
        <div class="row m-auto d-flex justify-content-center align-items-center">
            {{ $users->links() }}
        </div>
    </div>
<div>
<!-- Modal -->
<div class="modal fade" id="showUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    	
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    var url;
	var id;
    $('.icon-show').click(function(event) {
        event.preventDefault();
        id = $(this).data('id');
        console.log(id);
        url = 'users/';
        $.ajax({
            url: url + id,
            type: 'GET',
        })
        .done(function(res) {
            $('.modal-content').html(res);
        })
    });

    $('a.icon-delete').confirm({
        content: "Bạn có muốn xóa không?",
    });
</script>
@endsection
