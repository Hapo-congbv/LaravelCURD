<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">User Detail</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-3 p-0">
                    <img class="hapo-img-avatar" src="{{url('storage/',$userId->user_image)}}" alt="">
                </div>
                <div class="col-7 ml-2">
                    <div class="hapo-infor-name"><p>Account Name :<strong>{{ $userId->user_name }}</strong></p></div>
                    <div class="hapo-infor-name"><p>FullName : <strong>{{ $userId->full_name }}</strong></p></div>
                    <div class="hapo-infor-name"><p>Email : <strong>{{ $userId->email }}</strong></p></div>
                    <div class="hapo-infor-name"><p>Phone : <strong>{{ $userId->mobile }}</strong></p></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
</div>
