				<div class="control-group">
				  {!! Form::label('category_name', 'Nombre de la categoría', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					{!! Form::text('category_name', null, ['class' => 'input-xlarge', 'required' => '
					required']) !!} 
				  </div>
				</div>		  
				<div class="control-group hidden-phone">
				  	{!! Form::label('category_description', 'Descripción de la categoría', ['class' => 'control-label', 'for' => 'textarea2']) !!}
					<div class="controls">						
						{!! Form::text('category_description', null, ['class' => 'input-xlarge', 'required' => 'required']) !!}
					</div>
				</div>
				<div class="control-group hidden-phone">
				  {!! Form::label('category_status', 'Status de la categoría', ['class' => 'control-label', 'for' => 'textarea2']) !!}
				  <div class="controls">
					{!! Form::checkbox('publication_status', '1'); !!}
				  </div>
				</div>