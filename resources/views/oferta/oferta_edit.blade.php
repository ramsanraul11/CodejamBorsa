@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar oferta') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form  method="POST" action="/empresa/oferta/editOferta">
                            @csrf
                            <input type="number" name="IdOferta" style="display: none" value="{{$oferta->IdOferta}}"/>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="InputEditDescrOferta">Descripció</label>
                                    <input type="text" name="EditDescripcionOferta" class="form-control" id="InputEditDescrOferta" placeholder="Descripció" value="{{$oferta->descripcio}}">
                                </div>
                                <div class="form-group">
                                    <label for="InputEditPendentEnviar">Està pendent d'enviament?</label>
                                    @if($oferta->pendentEnviament == 1)
                                        <input type="checkbox" name="EditPendentOferta"  id="InputEditPendentEnviar" placeholder="Està pendent?" value="1" {{ old('pendentEnviament') ? 'checked="checked"' : '' }} checked>
                                    @else
                                        <input type="checkbox" name="EditPendentOferta"  id="InputEditPendentEnviar" value="1" {{ old('pendentEnviament') ? 'checked="checked"' : '' }} placeholder="Està pendent?">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="InputEditEmpresaOferta">Empresa</label>
                                    <select class="form-control custom-select" id="InputEditEmpresaOferta" name="EditEmpresaOferta">
                                        @foreach ($empreses as $empresa)
                                            @if($empresa->IdEmpresa == $oferta->IdEmpresa)
                                                <option value="{{ $empresa->IdEmpresa }}" selected>{{ $empresa->nom }}</option>
                                            @else
                                                <option value="{{ $empresa->IdEmpresa }}">{{ $empresa->nom }}</option>
                                            @endif
                                        @endforeach
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
