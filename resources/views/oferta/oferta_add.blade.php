@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Afegir oferta') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form  method="POST" action="{{route('submitOfertaAdd')}}">
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="InputEditDescrOferta">Descripció</label>
                                    <input type="text" name="EditDescripcionOferta" class="form-control" id="InputEditDescrOferta" placeholder="Descripció">
                                </div>
                                <div class="form-group">
                                    <label for="InputEditPendentEnviar">Està pendent d'enviament?</label>
                                    <input type="checkbox" name="EditPendentOferta"  id="InputEditPendentEnviar" value="1" checked disabled>

                                </div>
                                <div class="form-group">
                                    <label for="InputEditEmpresaOferta">Empresa</label>
                                    <select class="form-control custom-select" id="InputEditEmpresaOferta" name="EditEmpresaOferta">
                                        <option value="{{ $empresa->IdEmpresa }}" selected readonly="readonly">{{ $empresa->nom }}</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-5">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
