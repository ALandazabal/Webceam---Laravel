@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Lista de métodos de pago</a></li>
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
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Status</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                @foreach( $payments as $payment )
                <tbody>
                <tr>
                {!! Form::open(['route'=>['metodo-pago.destroy', $payment->payment_id],'method'=>'DELETE']) !!}
                    <td>{{ $payment->payment_id}}</td>
                    <td class="center">{{ $payment->payment_name}}</td>
                    <td class="center">{{ $payment->payment_description}}</td>
                    <td class="center">
                    @if($payment->publication_status == 1)                        
                        <a href="/unactive_payment/{{$payment->payment_id}}" class="label label-success">Activa</a>
                    @else                        
                        <a href="/active_payment/{{$payment->payment_id}}" class="label label-danger">No Activa</a>
                    @endif
                    </td>
                    <td class="center">
                        <a class="btn btn-success" href="/metodo-pago/{{$payment->payment_id}}/edit">
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
