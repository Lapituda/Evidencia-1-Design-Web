@extends('layouts.app')

@section('template_title')
    Diario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Diario') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('diarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Titulo</th>
										<th>Contenido</th>
										<th>Fecha Creacion</th>
										<th>Categoria Id</th>
										<th>Usuario Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diarios as $diario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $diario->titulo }}</td>
											<td>{{ $diario->contenido }}</td>
											<td>{{ $diario->fecha_creacion }}</td>
											<td>{{ $diario->categoria_id }}</td>
											<td>{{ $diario->usuario_id }}</td>

                                            <td>
                                                <form action="{{ route('diarios.destroy',$diario->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('diarios.show',$diario->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('diarios.edit',$diario->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $diarios->links() !!}
            </div>
        </div>
    </div>
@endsection
