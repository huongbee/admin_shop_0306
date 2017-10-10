@extends('layout')
@section('content')
<div class="panel panel-body">
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Import sản phẩm mới</h3></div>
            <div class="panel-body">
            	<form class="form-horizontal" method="POST" action="{{route('import-products')}}" enctype="multipart/form-data">
            		
            		{{csrf_field()}}
				  
				  <div class="form-group">
				    <label class="control-label col-sm-1">Chọn file</label>
				    <div class="col-sm-11">
				      <input type="file" name="file">
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-1 col-sm-11">
				      <button type="submit" class="btn btn-success">Import</button>
				    </div>
				  </div>
				</form>
            </div>
        </div>
    </section>
</div>
@endsection