@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="/usero">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-eye"></i>
		<a href="#">Detalle usuario</a>
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
			  <img class="card-img-top" src="../image/{{ $user->image}}" style="height:80px; width:80px;">
			  <div class="card-body">
			    <h1 class="card-title">{{$user->name}}</h1>
			    <h3>Correo: {{$user->email}}</h3>
				<p class="card-text">Contraseña: {{$user->password}}</p>
				<p class="card-text">Remember_token: {{$user->remember_token}}</p>
				<div class="form-actions">
					{!! Form::open(['route'=>['usuario.destroy', $user->id],'method'=>'DELETE']) !!}			  
						<a href="/usuario/{{$user->id}}/edit" class="btn btn-warning" role="button">Editar</a>
						{!! Form::submit('Eliminar',['class' => 'btn btn-danger']) !!}
						<a href="/usuario" class="btn btn-primary">Volver atras</a>
					{!! Form::close() !!}
				</div>
			  </div>
			</div>			

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection