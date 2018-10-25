				<div class="control-group">
				  {!! Form::label('avatar', 'Avatar', ['class' => 'control-label', 'for' => 'textarea2']) !!}
				  <div class="controls">
					{!! Form::file('avatar', $attributes = ['class' => 'input-file uniform_on', 'id' => 'fileInput', 'value' => 'avatar']) !!}
				  </div>
				</div> 
				<div class="control-group">
				  {!! Form::label('name', 'Nombre y apellido', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					{!! Form::text('name', null, ['class' => 'input-xlarge', 'required' => '
					required']) !!} 
				  </div>
				</div>
				<div class="control-group">
				  {!! Form::label('username', 'Usuario', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					{!! Form::text('username', null, ['class' => 'input-xlarge', 'required' => '
					required']) !!} 
				  </div>
				</div>
				<div class="control-group">
				  {!! Form::label('email', 'Email del usuario', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					{!! Form::text('email', null, ['class' => 'input-xlarge', 'required' => '
					required']) !!} 
				  </div>
				</div>
				<div class="control-group">
				  {!! Form::label('password', 'Contraseña', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					{!! Form::password('password', null, ['class' => 'input-xlarge', 'required' => '
					required']) !!} 
				  </div>
				</div>
				<div class="control-group">
				  {!! Form::label('password2', 'Repita la contraseña', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					{!! Form::password('password2', null, ['class' => 'input-xlarge']) !!} 
				  </div>
				</div>
				<div class="control-group">
				  {!! Form::label('phone', 'Teléfono del usuario', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					{!! Form::text('phone', null, ['class' => 'input-xlarge']) !!} 
				  </div>
				</div>
				<div class="control-group">
				  {!! Form::label('address', 'Dirección del usuario', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					{!! Form::text('address', null, ['class' => 'input-xlarge']) !!} 
				  </div>
				</div>
				<div class="control-group">
				  {!! Form::label('city', 'Ciudad del usuario', ['class' => 'control-label', 'for' => 'date01']) !!}
				  <div class="controls">
					{!! Form::text('city', null, ['class' => 'input-xlarge']) !!} 
				  </div>
				</div>