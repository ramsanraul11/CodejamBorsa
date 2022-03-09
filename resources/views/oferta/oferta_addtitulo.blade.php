@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Afegir Títol a '.$idOferta->descripcio) }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form  method="POST" action="/empresa/oferta/addEstudi">
                            @csrf
                            <input type="number" name="IdTitulado" style="display: none"/>
                            <div class="form-group row">
                                <div class="col">
                                    <label for="InputEstudiosTitulado">Titulo</label>
                                    <select required="required" class="form-control custom-select" id="InputEstudiosTitulado" name="EstudiId">
                                        @foreach ($estudis as $titulo)
                                            <option name="Estudi" value="{{ $titulo->IdEstudi }}">{{ $titulo->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row-cols-md-3">
                                <button type="submit" class="btn btn-primary mt-5">Afegir títol</button>
                                <input type="hidden" id="postId" name="id" value="{{$idOferta->IdOferta}}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
