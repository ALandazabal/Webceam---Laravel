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
		<a href="#">Actualizar usuario</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Actualizar usuario</h2>
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
			{!! Form::model($user, ['route'=> ['usuario.update', $user], 'method'=>'PUT', 'files' =>true, 'class' => 'form-horizontal']) !!}
				
			  <fieldset>
				
				@include('user.form_user')

				<div class="form-actions">
				  <!-- <button type="submit" class="btn btn-primary">update category </button> -->
				  {!! Form::submit('Actualizar usuario',['class' => 'btn btn-primary']) !!}
				  <a href="/usuario" class="btn btn-danger">Cancelar</a>
				</div>
			  </fieldset>
			<!-- </form>  -->  
			{!! Form::close() !!}

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection