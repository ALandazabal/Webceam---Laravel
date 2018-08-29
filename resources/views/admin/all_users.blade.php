@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Lista de usuarios</a></li>
</ul>
<p class="alert-success">
    <?php
        $message=Session::get('message');
        if ($message) 
        {
            echo $message;
            Session::put('message',null);                
        }                    
    ?>
</p>
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Remember_token</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                @foreach( $users as $user )
                <tbody>
                <tr>
                {!! Form::open(['route'=>['usuario.destroy', $user->id],'method'=>'DELETE']) !!}
                    <td>{{ $user->id}}</td>
                    <td class="center"><a href="/usuario/{{$user->id}}">{{ $user->name}}</a></td>
                    <td class="center">{{ $user->email}}</td>
                    <td class="center">{{ $user->password}}</td>
                    <td class="center">{{ $user->remember_token}}</td>
                    <td class="center">
                        <a class="btn btn-success" href="/usuario/{{$user->id}}/edit">
                            <i class="halflings-icon white edit"></i>  
                        </a>
                        {!! Form::submit('Eliminar',['class' => 'btn btn-danger', 'id' => 'delete']) !!}
                        </a>
                    </td>
                {!! Form::close() !!}
                </tr>
                </tbody>
                @endforeach
            </table>            
        </div>
    </div><!--/span-->
</div><!--/row-->

@endsection
