@extends('layouts.app')

@section('content')

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">

        <a class="btn btn-success pull-right" href="{{ URL('estados/create') }}"><i class="fa fa-plus"></i>  Cadastar Estado</a>
        <div class="clearfix"></div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de estados cadastrados
            </div>
            <!-- /.panel-heading -->

            <!-- will be used to show any messages -->
            @if (session()->has('message'))
                <div class="alert alert-info">{{ session()->get('message') }}</div>
            @endif            

            <div class="panel-body">
                <table width="100%" class="table table-hover table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>SIGLA</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($estados as $key => $value)
					        <tr>
					            <td>{{ $value->id }}</td>
					            <td>{{ $value->nome }}</td>
					            <td>{{ $value->sigla }}</td>
					            
					            <!-- we will also add show, edit, and delete buttons -->
					            <td>
					                <a class="btn btn-small btn-info" href="{{ URL('estados/' . $value->id) }}"><i class="fa fa-eye"></i> Ver</a>

					                <a class="btn btn-small btn-warning" href="{{ URL('estados/' . $value->id . '/edit') }}"><i class="fa fa-edit"></i> Editar</a>

                                    <a href="{{ url('estados', $value->id) }}" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                                 document.getElementById('delete-form{{ $value->id }}').submit();">
                                        <i class="fa fa-times"></i> Deletar
                                    </a>
                                    
                                    <form id="delete-form{{ $value->id }}" action="{{ url('estados', $value->id) }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>

					            </td>
					        </tr>
					    @endforeach
                     
                    </tbody>
                </table>
             
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

@endsection