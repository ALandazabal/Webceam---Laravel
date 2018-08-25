@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Actualizar producto</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Actualizar producto</h2>
		</div>
		<p class="alert-success">
			<?php
			$message=Session::get('message');
			if($message)
			{
				echo $message;
				Session::put('message',null);
			}
           ?>
		</p>
		<div class="box-content">
			<!-- <form class="form-horizontal" action="/producto/" method="PUT" enctype="multipart/form-data"> -->
			{!! Form::model($product, ['route'=> ['producto.update', $product], 'method'=>'PUT', 'files' =>true, 'class' => 'form-horizontal']) !!}
				
			  <fieldset>
				
				@include('product.form_product')

				<div class="form-actions">
				  <!-- <button type="submit" class="btn btn-primary">update Product </button> -->
				  {!! Form::submit('Actualizar producto',['class' => 'btn btn-primary']) !!}
				  <a href="/producto" class="btn btn-danger">Cancelar</a>
				</div>
			  </fieldset>
			<!-- </form>  -->  
			{!! Form::close() !!}

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection