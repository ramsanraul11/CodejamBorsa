@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row row-cols-2 justify-content-evenly">
                            <div class="col-9 align-self-center">{{ __('Estudis') }}</div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped table-hover mb-5">
                            <thead>
                            <tr>
                                <th>Estudis de l'usuari {{ $user->name }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ue as $estudi)
                                <tr id="{{$estudi->IdEstudiUser}}">
                                    <td> {{$estudi->nom}} </td>
                                    <td> {{$estudi->AnyPromocio}} </td>
                                    @if(Auth::user()->isCoordinador == true)
                                    <td>
                                        <button type="button" class="btn btn-success" onclick="editEstudi({{$estudi->IdEstudi}})"><i class="fas fa-edit"></i></button>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary" onclick="window.location='/fitxa/estudis/addTitulo'">Afegir Estudis</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
