@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Lista de productos</a></li>
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
                        <th>Producto ID</th>
                        <th>Nombre Producto</th>
                        <th>Descripción corta</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Status</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                @foreach( $products as $products )
                <tbody>
                <tr>
                {!! Form::open(['route'=>['producto.destroy', $products->product_id],'method'=>'DELETE']) !!}
                    <td>{{ $products->product_id}}</td>
                    <td class="center"><a href="/producto/{{$products->product_id}}">{{ $products->product_name}}</a></td>
                    <td class="center">{{ $products->product_short_description}}</td>
                    <td> <img src="../image/{{ $products->product_image}}" style="height:80px; width:80px;"></td>
                    <td class="center">{{ $products->product_price}}</td>
                    <td class="center">
                    @if($products->publication_status == 1)                        
                        <a href="/unactive_product/{{$products->product_id}}/{{ $user_id }}" class="label label-success">Activa</a>
                    @else                        
                        <a href="/active_product/{{$products->product_id}}/{{ $user_id }}" class="label label-danger">No Activa</a>
                    @endif
                    </td>
                    <td class="center">
                       <!--  @if($products->publication_status == 1)
                                                <a class="btn btn-info" >
                                                    <i class="halflings-icon white thumbs-down"></i>  
                                                </a>
                                                @else 
                                                <a class="btn btn-info">
                                                    <i class="halflings-icon white thumbs-up"></i>  
                                                </a>
                                                @endif   -->                         
                        <a class="btn btn-success" href="/producto/{{$products->product_id}}/editar/{{ $user_id }}">
                            <i class="halflings-icon white edit"></i>  
                        </a>
                        {!! Form::submit('Eliminar',['class' => 'btn btn-danger', 'id' => 'delete']) !!}
                        <!-- </a> -->
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
