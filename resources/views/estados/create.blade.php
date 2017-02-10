@extends('layouts.app')

@section('content')

	<!-- if there are creation errors, they will show here -->

	<form method="POST" class="form-horizontal" action="{{ url('estados') }}" role="form">
		{{ csrf_field() }}

		<div class="row">
	        <div class="col-md-12">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                	Cadastrar novo estado	                	
	                </div>

	                <div class="panel-body">

					    <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
				            <label for="name" class="col-md-3 control-label">Nome</label>
				            
				            <div class='col-md-6'>
					            <input class="form-control" name="nome" value="{{ old('name') }}">
					            @if ($errors->has('name'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('name') }}</strong>
		                            </span>
		                        @endif
		                    </div>    
				        </div>

				        <div class="form-group{{ $errors->has('sigla') ? ' has-error' : '' }}">
				            <label for="sigla" class="col-md-3 control-label">Sigla</label>

				            <div class='col-md-6'>
				            	<input class="form-control" name="sigla" value="{{ old('sigla') }}">
				            	@if ($errors->has('sigla'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('sigla') }}</strong>
		                            </span>
		                        @endif
		                    </div>    
				        </div>

	                </div>
	                <div class='panel-footer'>			        			        		
	                	<div class="pull-right">

	                		<a class="btn btn-default" href="{{ url('estados') }} "><i class="fa fa-angle-left"></i> Voltar</a>	                	
				        	<button type='submit' class='btn btn-primary'><i class="fa fa-check"></i> Salvar</button>				        	

				        </div>

				        <div class="clearfix"></div>
			        </div>
	            </div>
	        </div>
	    </div>
	</form>

@endsection