@extends('admin_layout')
@section('admin_content')
<?php
    $admin = null;
    if(isset($_SESSION['email'])){
        $admin = $_SESSION['email'];
    }
?>
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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                @foreach( $users as $user )
                <tbody>
                <tr>
                {!! Form::open(['route'=>['usuario.destroy', $user->id],'method'=>'DELETE']) !!}
                    <td>{{ $user->id}}</td>
                    <td class="center"><a href="/usuario/{{$user->id}}">{{ $user->name}}</a></td>
                    <td class="center">{{ $user->username}}</td>
                    <td class="center">{{ $user->email}}</td>
                    <td class="center">
                        @if($user->status == 1) 
                            @if($user->type == 0)                       
                                <a class="label label-success" href="/unactive_user/{{$user->id}}">Activo</a>
                            @else
                                <p class="label label-success">Activo</p>
                            @endif
                        @else 
                            @if($user->type == 0)                        
                                <a class="label label-danger" href="/active_user/{{$user->id}}">No activo</a>
                            @else
                                <p class="label label-danger">No activo</p>
                            @endif
                        @endif
                    </td>
                    <td class="center">
                        @if($user->type == 1)                        
                            <p >Admin</p>
                        @else                        
                            <a href="/become_user_admin/{{$user->id}}">Normal</a>
                        @endif
                    </td>
                    <td class="center">
                        @if($user->type == 0 || $user->email == $admin)
                            <!-- @if($user->status == 1)
                                <a class="btn btn-info" href="/unactive_user/{{$user->id}}">
                                    <i class="halflings-icon white thumbs-down"></i>  
                                </a>
                            @else 
                                <a class="btn btn-info" href="/active_user/{{$user->id}}">
                                    <i class="halflings-icon white thumbs-up"></i>  
                                </a>
                            @endif -->
                            <a class="btn btn-success" href="/usuario/{{$user->id}}/edit">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            {!! Form::submit('Eliminar',['class' => 'btn btn-danger', 'id' => 'delete']) !!}
                            </a>
                        @endif
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
