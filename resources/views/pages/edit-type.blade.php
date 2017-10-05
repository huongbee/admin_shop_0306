@extends('layout')
@section('content')
<div class="panel panel-body">
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Sửa thông tin loại {{$type->name}}</h3></div>
            <div class="panel-body">
            	<form class="form-horizontal">
				  <div class="form-group">
				    <label class="control-label col-sm-1" >Tên loại:</label>
				    <div class="col-sm-11">
				      <input type="text" class="form-control" name="name" value="{{$type->name}}">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-1">Mô tả</label>
				    <div class="col-sm-11"> 
				      <textarea class="form-control" name="desc" rows="8" >
				      	{{$type->description}}
				      </textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-1">Hình</label>
				    <div class="col-sm-11"> 
				      <img src="admin_theme/img/product/{{$type->image}}" width="150px">
				      <br><br>
				      <input type="file" name="hinh">
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-1 col-sm-11">
				      <button type="submit" class="btn btn-success">Lưu</button>
				    </div>
				  </div>
				</form>
            </div>
        </div>
    </section>
</div>
@endsection