@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Añadir categoría</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Añadir una nueva categoría</h2>
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
			{!! Form::open(['route'=>'categoria.store','method'=>'POST', 'files' =>true, 'class' => 'form-horizontal']) !!}
			  <fieldset>
				
				@include('category.form_category')

				<div class="form-actions">
				  {!! Form::submit('Añadir categoría',['class' => 'btn btn-primary']) !!}
				  <a href="/categoria" class="btn btn-danger">Cancelar</a>
				</div>
			  </fieldset>
			{!! Form::close() !!}

		</div>
	</div>

</div>
@endsection