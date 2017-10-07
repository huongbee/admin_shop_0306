@extends('layout')
@section('content')
<style>
td a{
  margin-left: 15px
}
</style>
  <div class="panel panel-body">
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading"><b>Danh sách Nhân viên</b>
            </div>
            <div class="panel-body">

            	@if(Session::has('flag'))
            		<div class="alert alert-dismissable alert-{{Session::get('flag')}}">
            			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            			{{Session::get('message')}}
            		</div>
            	
            	@endif

                <table  class="table table-hover">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Họ tên</th>
                      <th>Email</th>
                      <th>Quyền</th>
                      <th>Tùy chọn</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $stt=1 ?>
                    @foreach($users as $user)
                    <tr>
                      <td>{{$stt}}</td>
                      <td>{{$user->full_name}}</td>
                      <td>{{$user->email}}</td>
                      <td>
                      	@if($user->role==1 && $user->active==1)
                      		Admin
                      	@elseif($user->role==0 && $user->active==1)
                      		Nhân viên
                      	@else
                      		<p style="color:red">Người dùng chưa Active</p>
                      	@endif
                      </td>
                      <td>
	                	@if($user->role==0 && $user->active==1)
	              			<a href="{{route('edit-user',[$user->id,1])}}">Set Admin</a>
	              		@elseif($user->active==0)
	              			<a href="{{route('edit-user',[$user->id,0])}}">Active</a>
	              		@endif
                        
                        <a href="#"><i class="fa fa-trash-o fa-2x" aria-hidden="true" title="Xóa"></i> </a>

                      </td>
                    </tr>
                    <?php $stt++?>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </section>
  </div>
@endsection