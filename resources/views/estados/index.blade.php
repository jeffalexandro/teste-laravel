@extends('layouts.app')

@section('content')

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de estados cadastrados
            </div>
            <!-- /.panel-heading -->
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

					                <a class="btn btn-small btn-success" href="{{ URL::to('estados/' . $value->id) }}">Show this Nerd</a>

					                <a class="btn btn-small btn-info" href="{{ URL::to('estados/' . $value->id . '/edit') }}">Edit this Nerd</a>

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