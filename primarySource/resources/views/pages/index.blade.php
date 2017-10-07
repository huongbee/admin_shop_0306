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
            <div class="panel-heading"><b>Danh sách loại SP</b></div>
            <div class="panel-body">
                @if(Session::has('error'))
                  <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
                @if(Session::has('success'))
                  <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                <table  class="table table-hover">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên Loại</th>
                      <th width="40%">Mô tả</th>
                      <th>Hình</th>
                      <th>Tùy chọn</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $stt=1 ?>
                    @foreach($type as $loaisp)
                    <tr id="type-{{$loaisp->id}}">
                      <td>{{$stt}}</td>
                      <td>{{$loaisp->name}}</td>
                      <td width="40%">{{$loaisp->description}}</td>
                      <td>
                          <img src="admin_theme/img/product/{{$loaisp->image}}" alt="{{$loaisp->name}}" width="150px">
                      </td>
                      <td>
                        <a href="{{route('list-product',[$loaisp->id])}}"><i class="fa fa-list fa-2x" aria-hidden="true" title="Xem sản phẩm"></i></a>
                        <a href="{{route('edit-type',$loaisp->id)}}"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" title="Sửa"></i></a>
                        <a class="delete" dataId="{{$loaisp->id}}" dataName="{{$loaisp->name}}"><i class="fa fa-trash-o fa-2x" aria-hidden="true" title="Xóa" data-toggle="modal" data-target="#myModal"></i> </a>

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

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="max-width: 500px; margin:25%">
      <div class="modal-body">
        <p>Bạn có chắc chắn xóa <b></b> hay không?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
        <button id="btnAccept" type="button" class="btn btn-primary btn-sm">OK</button>
      </div>
    </div>

  </div>
</div>
<script src="admin_theme/js/jquery.js"></script>
<script>
$(document).ready(function() {

    $('.delete').click(function(){

        var id = $(this).attr('dataId');
        var name = $(this).attr('dataName');
        var route = "{{route('delete-type')}}";

        console.log(id)
        console.log(name)

        $('.modal-body b').html(name)

        $('#btnAccept').click(function() {
            //ajax
            $.ajax({
                url : route,
                type : 'POST',
                data :{
                    id : id, //tên biến truyền đi : giá trị ở line 76
                    _token : "{{csrf_token()}}" 
                },
                success: function(data){
                    data = data.trim();
                    $("#myModal").modal('hide')

                    if(data=="done"){
                        $("#type-"+id).hide();
                        $('.modal-body p').text("Xóa thành công")
                        $('#btnAccept').hide();

                        $("#myModal").modal('show')
                    }
                    else{

                        $('.modal-body p').text("Lỗi, vui lòng thử lại")
                        $('#btnAccept').hide();

                        $("#myModal").modal('show')
                        //location.reload();
                        
                    }
                    setTimeout(location.reload.bind(location), 3000);
                }
            })

        });



    })
});
</script>

@endsection