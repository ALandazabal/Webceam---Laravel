				<div class="control-group">
				  {!! Form::label('manufacture_name', 'Nombre de la industria', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					{!! Form::text('manufacture_name', null, ['class' => 'input-xlarge', 'required' => '
					required']) !!} 
				  </div>
				</div>		  
				<div class="control-group hidden-phone">
				  	{!! Form::label('manufacture_description', 'Descripción de la industria', ['class' => 'control-label', 'for' => 'textarea2']) !!}
					<div class="controls">						
						{!! Form::text('manufacture_description', null, ['class' => 'input-xlarge', 'required' => 'required']) !!}
					</div>
				</div>
				<div class="control-group hidden-phone">
				  {!! Form::label('manufacture_status', 'Status de la industria', ['class' => 'control-label', 'for' => 'textarea2']) !!}
				  <div class="controls">
					{!! Form::checkbox('publication_status', '1'); !!}
				  </div>
				</div>