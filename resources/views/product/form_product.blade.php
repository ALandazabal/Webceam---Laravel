				<div class="control-group">
				  <!-- <label class="control-label" for="date01">Nombre del producto</label> -->
				  {!! Form::label('product_name', 'Nombre del producto', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					<!-- <input type="text" class="input-xlarge" name="product_name" required=""> -->
					{!! Form::text('product_name', null, ['class' => 'input-xlarge', 'required' => '
					required']) !!} 
				  </div>
				</div>
        		<div class="control-group">
					<!-- <label class="control-label" for="selectError3">Categoría</label> -->
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
					  <?php //$all_published_category=DB::table('tbl_category')->where('publication_status',1)->get(); ?>
					   <!-- <Form::select('category_id', $all_published_category->pluck('category_name', 'category_id') , 'category_id', ['placeholder' => 'Seleccione una categoría...']) > -->
					</div>
				</div>	
				<div class="control-group">
					<!-- <label class="control-label" for="selectError4">Industria</label> -->
					{!! Form::label('manufacture_id', 'Tipo de industria', ['class' => 'control-label', 'for' => 'selectError4']) !!}
					<div class="controls">
					  <select id="selectError4" name="manufacture_id"> 
					  		<option>Seleccione un tipo de industria...</option>
					  			<?php
					  			    $all_published_manufacture=DB::table('tbl_manufacture')->where('publication_status',1)->get();
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
				  <!-- <label class="control-label" for="textarea2">Descripción del producto</label> -->
				  	{!! Form::label('product_short_description', 'Descripción corta del producto', ['class' => 'control-label', 'for' => 'textarea2']) !!}
					  <div class="controls">
						<!-- <textarea class="cleditor" name="product_description" rows="3" required=""></textarea> -->
						{!! Form::textarea('product_short_description',null,['class'=>'cleditor', 'rows' => 1, 'cols' => 40]) !!}
					  </div>
				</div>
				<div class="control-group hidden-phone">
				  <!-- <label class="control-label" for="textarea2">Descripción del producto</label> -->
				  	{!! Form::label('product_long_description', 'Descripción larga del producto', ['class' => 'control-label', 'for' => 'textarea2']) !!}
					  <div class="controls">
						<!-- <textarea class="cleditor" name="product_description" rows="3" required=""></textarea> -->
						{!! Form::textarea('product_long_description',null,['class'=>'cleditor', 'rows' => 3, 'cols' => 40]) !!}
					  </div>
				</div>
				<div class="control-group">
				  <!-- <label class="control-label" for="date01">Precio del producto</label> -->
				  {!! Form::label('product_price', 'Precio del producto', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					<!-- <input type="text" class="input-xlarge" name="product_price" required=""> -->
					{!! Form::text('product_price', null, ['class' => 'input-xlarge', 'required' => 'required']) !!}
				  </div>
				</div>
                <div class="control-group">
				  <!-- <label class="control-label" for="fileInput">Imagen</label> -->
				  {!! Form::label('product_image', 'Imagen del producto', ['class' => 'control-label', 'for' => 'textarea2']) !!}
				  <div class="controls">
					<!-- <input class="input-file uniform_on" name="product_image" id="fileInput" type="file"> -->
					{!! Form::file('product_image', $attributes = ['class' => 'input-file uniform_on', 'id' => 'fileInput', 'value' => 'product_image']) !!}
				  </div>
				</div>  
				<div class="control-group">
				  <!-- <label class="control-label" for="date01">Tamaño del producto</label> -->
				  {!! Form::label('product_size', 'Tamaño del producto', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					<!-- <input type="text" class="input-xlarge" name="product_size" required=""> -->
					{!! Form::text('product_size', null, ['class' => 'input-xlarge', 'required' => 'required']) !!}
				  </div>
				</div>
				<div class="control-group">
				  <!-- <label class="control-label" for="date01">Color del producto</label> -->
				  {!! Form::label('product_color', 'Color del producto', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					<!-- <input type="text" class="input-xlarge" name="product_color" required=""> -->
					{!! Form::text('product_color', null, ['class' => 'input-xlarge', 'required' => 'required']) !!}
				  </div>
				</div>
				<div class="control-group hidden-phone">
				  <!-- <label class="control-label" for="textarea2">Status de la publicación</label> -->
				  {!! Form::label('product_status', 'Status del producto', ['class' => 'control-label', 'for' => 'textarea2']) !!}
				  <div class="controls">
					<!-- <input type="checkbox" name="publication_status" value="1"> -->
					{!! Form::checkbox('publication_status', '1'); !!}
				  </div>
				</div>