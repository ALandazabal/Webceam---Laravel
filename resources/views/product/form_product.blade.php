				<div class="control-group">
				  {!! Form::label('product_name', 'Nombre del producto', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					{!! Form::text('product_name', null, ['class' => 'input-xlarge', 'required' => '
					required']) !!} 
				  </div>
				</div>
        		<div class="control-group">
					{!! Form::label('category_id', 'Categoría', ['class' => 'control-label', 'for' => 'selectError3']) !!}
					<div class="controls">
					   <select id="selectError3" name="category_id"> 
					  	<option>seleccione una categoría...</option>
					                       <?php
					                            $all_published_category=DB::table('categories')
					                                                    ->where('publication_status',1)
					                                                    ->get();
					                            foreach($all_published_category as $v_category){ 
					                              	if($product != null){ ?>
					  								<option value="{{$v_category->category_id}}" selected="selected">{{$v_category->category_name}}</option>	
						  					<?php 	}else{ ?>
														<option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
						  					<?php	} 
						  						}?>				
					  </select> 
					</div>
				</div>	
				<div class="control-group">
					{!! Form::label('manufacture_id', 'Tipo de industria', ['class' => 'control-label', 'for' => 'selectError4']) !!}
					<div class="controls">
					  <select id="selectError4" name="manufacture_id"> 
					  		<option>Seleccione un tipo de industria...</option>
					  			<?php
					  			    $all_published_manufacture=DB::table('manufactures')->where('publication_status',1)->get();
					  			    foreach($all_published_manufacture as $v_manufacture){
					  			    	if($product != null){ ?>  
					  					<option value="{{$v_manufacture->manufacture_id}}" selected="selected">{{$v_manufacture->manufacture_name}}</option>	
					  			<?php 	}else{ ?>
					  					<option value="{{$v_manufacture->manufacture_id}}">{{$v_manufacture->manufacture_name}}</option>	
					  			<?php	} 
						  			}?>	 			
					  </select>
					</div>
				</div>			  
				<div class="control-group hidden-phone">
				  	{!! Form::label('product_short_description', 'Descripción corta del producto', ['class' => 'control-label', 'for' => 'textarea2']) !!}
					  <div class="controls">
						{!! Form::textarea('product_short_description',null,['class'=>'cleditor', 'rows' => 1, 'cols' => 40]) !!}
					  </div>
				</div>
				<div class="control-group hidden-phone">
				  	{!! Form::label('product_long_description', 'Descripción larga del producto', ['class' => 'control-label', 'for' => 'textarea2']) !!}
					  <div class="controls">
						{!! Form::textarea('product_long_description',null,['class'=>'cleditor', 'rows' => 3, 'cols' => 40]) !!}
					  </div>
				</div>
				<div class="control-group hidden-phone">
				  	{!! Form::label('product_send_conditions', 'Condiciones de envío', ['class' => 'control-label', 'for' => 'textarea2']) !!}
					  <div class="controls">
						{!! Form::textarea('product_send_conditions',null,['class'=>'cleditor', 'rows' => 3, 'cols' => 40]) !!}
					  </div>
				</div>
				<div class="control-group">
				  {!! Form::label('product_price', 'Precio del producto', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					{!! Form::text('product_price', null, ['class' => 'input-xlarge', 'required' => 'required']) !!}
				  </div>
				</div>
				<div class="control-group">
					{!! Form::label('paymentm', 'Método de pago', ['class' => 'control-label', 'for' => 'selectError4']) !!}
					<div class="controls">
						<?php
					  		$all_published_payment=DB::table('payments')->where('publication_status',1)->get();
					  			foreach($all_published_payment as $v_payment){
					  			    if($product != null){ ?>
					  					<!-- <input type="checkbox" name="paymentm[]" value="{{$v_payment->payment_id}}">{{$v_payment->payment_name}}</br> -->	
					  					{!! Form::checkbox('name', 'value', true) !!}
					  		<?php 	}else{ ?>
					  					<!-- <input type="checkbox" name="paymentm[]" value="{{$v_payment->payment_id}}">{{$v_payment->payment_name}}</br>	 -->
					  					{!! Form::checkbox($v_payment->payment_name, $v_payment->payment_id, false) !!}
					  		<?php 	} 
						  		}?>
						<!-- <input type="checkbox" name="paymentm" value="">PayPal</br>
						<input type="checkbox" name="paymentm" value="">Mercado Pago -->
					</div>
				</div>
                <div class="control-group">
				  {!! Form::label('product_image', 'Imagen del producto', ['class' => 'control-label', 'for' => 'textarea2']) !!}
				  <div class="controls">
					{!! Form::file('product_image', $attributes = ['class' => 'input-file uniform_on', 'id' => 'fileInput', 'value' => 'product_image']) !!}
				  </div>
				</div>  
				<div class="control-group">
				  {!! Form::label('product_size', 'Cantidad del producto producto', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					{!! Form::text('product_size', null, ['class' => 'input-xlarge', 'required' => 'required']) !!}
				  </div>
				</div>
				<div class="control-group">
				  {!! Form::label('product_color', 'Color del producto', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					{!! Form::text('product_color', null, ['class' => 'input-xlarge', 'required' => 'required']) !!}
				  </div>
				</div>
				<div class="control-group hidden-phone">
				  {!! Form::label('product_status', 'Status del producto', ['class' => 'control-label', 'for' => 'textarea2']) !!}
				  <div class="controls">
					{!! Form::checkbox('publication_status', '1'); !!}
				  </div>
				</div>