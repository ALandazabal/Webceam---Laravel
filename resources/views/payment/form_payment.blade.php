				<div class="control-group">
				  {!! Form::label('payment_name', 'Nombre del método de pago', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					{!! Form::text('payment_name', null, ['class' => 'input-xlarge', 'required' => '
					required']) !!} 
				  </div>
				</div>		  
				<div class="control-group hidden-phone">
				  	{!! Form::label('payment_description', 'Descripción del método de pago', ['class' => 'control-label', 'for' => 'textarea2']) !!}
					<div class="controls">						
						{!! Form::text('payment_description', null, ['class' => 'input-xlarge']) !!}
					</div>
				</div>
				<div class="control-group hidden-phone">
				  {!! Form::label('payment_status', 'Status del método de pago', ['class' => 'control-label', 'for' => 'textarea2']) !!}
				  <div class="controls">
					{!! Form::checkbox('publication_status', '1'); !!}
				  </div>
				</div>