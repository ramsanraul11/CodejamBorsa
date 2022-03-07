@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Afegir Títol a '.$username) }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form  method="POST" action="./addTitulo">
                            @csrf
                            <input type="number" name="IdTitulado" style="display: none"/>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="InputEstudiosTitulado">Titulo</label>
                                        <select required="required" class="form-control custom-select" id="InputEstudiosTitulado" name="titulos">
                                            @foreach ($titulos as $titulo)
                                                <option name="EstudisTitulado" value="{{ $titulo->IdEstudi }}">{{ $titulo->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="InputAnyPromocio">Any Promocio</label>
                                        <select required="required" class="form-control custom-select" id="InputAnyPromocio" name="AnyPromocio">
                                            @foreach ($anys as $any)
                                                <option name="AnyPromocio" value="{{ $any }}">{{ $any }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            <div class="row-cols-md-3">
                                <button type="submit" class="btn btn-primary mt-5">Afegir títol</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
