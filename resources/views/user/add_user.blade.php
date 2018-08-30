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
		<a href="#">Añadir usuarios</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Añadir un nuevo usuarios</h2>
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
			{!! Form::open(['route'=>'usuario.store','method'=>'POST', 'files' =>true, 'class' => 'form-horizontal']) !!}
			  <fieldset>
				
				@include('user.form_user')

				<div class="form-actions">
				  {!! Form::submit('Añadir usuario',['class' => 'btn btn-primary']) !!}
				  <a href="/usuario" class="btn btn-danger">Cancelar</a>
				</div>
			  </fieldset>
			{!! Form::close() !!}

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection