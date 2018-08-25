@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="/producto">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-eye"></i>
		<a href="#">Detalle producto</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
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
			@csrf
			<div class="card" style="width: 80%; margin: 0 auto;">
			  <img class="card-img-top" src="../image/{{ $product->product_image}}" style="height:80px; width:80px;">
			  <div class="card-body">
			    <h1 class="card-title">{{$product->product_name}}</h1>
			    <h3>{{$product->product_short_description}}</h3>
				<p class="card-text">Descripción Larga: {{$product->product_long_description}}</p>
				<p class="card-text">Precio: {{$product->product_price}}</p>
				<p class="card-text">Tamaño: {{$product->product_size}}</p>
				<p class="card-text">Color: {{$product->product_color}}</p>
				<p class="card-text">Estado: 
					@if($product->publication_status == 1)
						Activa
					@else
						Desactivado
					@endif
				</p>
				<p class="card-text">Categoría: <?php $category = DB::table('categories')
            ->where('category_id',$product->category_id)->first(); echo $category->category_name;?></p>
				<p class="card-text">Sector Industrial: <?php $manufacture = DB::table('tbl_manufacture')
            ->where('manufacture_id',$product->manufacture_id)->first(); echo $manufacture->manufacture_name;?></p>
				<div class="form-actions">
					{!! Form::open(['route'=>['producto.destroy', $product->product_id],'method'=>'DELETE']) !!}			  
						<a href="/producto/{{$product->product_id}}/edit" class="btn btn-warning" role="button">Editar</a>
						{!! Form::submit('Eliminar',['class' => 'btn btn-danger']) !!}
						<a href="/producto" class="btn btn-primary">Volver atras</a>
					{!! Form::close() !!}
				</div>
			  </div>
			</div>			

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection