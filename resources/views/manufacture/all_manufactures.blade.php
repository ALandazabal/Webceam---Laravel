@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Lista de categorías</a></li>
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
                        <th>Categoría ID</th>
                        <th>Nombre categoría</th>
                        <th>Descripción</th>
                        <th>Status</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                @foreach( $manufactures as $manufacture )
                <tbody>
                <tr>
                {!! Form::open(['route'=>['industria.destroy', $manufacture->manufacture_id],'method'=>'DELETE']) !!}
                    <td>{{ $manufacture->manufacture_id}}</td>
                    <td class="center">{{ $manufacture->manufacture_name}}</td>
                    <td class="center">{{ $manufacture->manufacture_description}}</td>
                    <td class="center">
                    @if($manufacture->publication_status == 1)                        
                        <a href="/unactive_manufacture/{{$manufacture->manufacture_id}}" class="label label-success">Activa</a>
                    @else                        
                        <a href="/active_manufacture/{{$manufacture->manufacture_id}}" class="label label-danger">No Activa</a>
                    @endif
                    </td>
                    <td class="center">
                    <!-- @if($manufacture->publication_status == 1)
                                              <a class="btn btn-info">
                                                  <i class="halflings-icon white thumbs-down"></i>  
                                              </a>
                                              @else 
                                              <a class="btn btn-info">
                                                  <i class="halflings-icon white thumbs-up"></i>  
                                              </a>
                                              @endif  -->                          
                        <a class="btn btn-success" href="/industria/{{$manufacture->manufacture_id}}/edit">
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
