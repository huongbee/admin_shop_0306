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
            <div class="panel-heading"><b>Danh sách sản phẩm thuộc loại <span style="color: red">{{$type->name}}</span></b>
            </div>
            <div class="panel-body">
                <table  class="table table-hover">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên Sản phẩm</th>
                      <th width="30%">Mô tả</th>
                      <th>Hình</th>
                      <th>Tùy chọn</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $stt=1 ?>
                    @foreach($products as $sanpham)
                    <tr>
                      <td>{{$stt}}</td>
                      <td>{{$sanpham->name}}</td>
                      <td width="30%">{{$sanpham->description}}</td>
                      <td>
                          <img src="admin_theme/img/product/{{$sanpham->image}}" alt="{{$sanpham->name}}" width="150px">
                      </td>
                      <td>
                        <a href="#"><i class="fa fa-list fa-2x" aria-hidden="true" title="Xem sản phẩm"></i></a>
                        <a href="#"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" title="Sửa"></i></a>
                        <a href="#"><i class="fa fa-trash-o fa-2x" aria-hidden="true" title="Xóa"></i> </a>

                      </td>
                    </tr>
                    <?php $stt++?>
                    @endforeach
                  </tbody>
                </table>
                {{$products->links()}}
            </div>
        </div>
    </section>
  </div>
@endsection