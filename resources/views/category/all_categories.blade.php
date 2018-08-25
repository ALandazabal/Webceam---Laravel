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
                @foreach( $categories as $category )
                <tbody>
                <tr>
                {!! Form::open(['route'=>['categoria.destroy', $category->category_id],'method'=>'DELETE']) !!}
                    <td>{{ $category->category_id}}</td>
                    <td class="center">{{ $category->category_name}}</td>
                    <td class="center">{{ $category->category_description}}</td>
                    <td class="center">
                    @if($category->publication_status == 1)                        
                        <span class="label label-success">Activa</span>
                    @else                        
                        <span class="label label-danger">No Activa</span>
                    @endif
                    </td>
                    <td class="center">
                    @if($category->publication_status == 1)
                    <a class="btn btn-info" href="/unactive_category/{{$category->category_id}}">
                        <i class="halflings-icon white thumbs-down"></i>  
                    </a>
                    @else 
                    <a class="btn btn-info" href="/active_category/{{$category->category_id}}">
                        <i class="halflings-icon white thumbs-up"></i>  
                    </a>
                    @endif                           
                        <a class="btn btn-success" href="/categoria/{{$category->category_id}}/edit">
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
    </div>
</div>

@endsection
