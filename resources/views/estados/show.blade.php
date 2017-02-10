@extends('layouts.app')

@section('content')

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Detalhes Estado
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

            	<h2>Nome: {{ $estado->nome }}</h2>
            		

            	<div class="row">
            		<div class="col-md-12">
            			Sigla:
            			{{ $estado->sigla }}
            		</div>
            	</div>

            	<div class="row">
            		<div class="col-md-12">
            			Cadastrado em:
            			{{ $estado->created_at }}
            		</div>
            	</div>

            	<div class="row">
            		<div class="col-md-12">
            			Última ediçao em :
            			{{ $estado->updated_at }}
            		</div>
            	</div>
        	</div>
            <div class='panel-footer'>
                
                <div class="pull-right">

                    <a class="btn btn-default" href="{{ url('estados') }} "><i class="fa fa-angle-left"></i> Voltar</a>                     
                    
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@endsection