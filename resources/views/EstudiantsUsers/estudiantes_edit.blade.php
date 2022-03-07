@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Perfil') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form  method="POST" action="{{route('SubmitestudiantsEdit')}}">
                            @csrf
                            <input type="number" name="IdTitulado" style="display: none" value="{{$user->id}}"/>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="InputEditNameTitulado">Nom</label>
                                    <input type="text" name="NameTitulado" class="form-control" id="InputEditNameTitulado" placeholder="Name" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="InputEditSurnameTitulado">Cognom</label>
                                    <input type="text" name="SurnameTitulado" class="form-control" id="InputEditSurnameTitulado" placeholder="Surname" value="{{$user->surname}}">
                                </div>
                                <div class="form-group">
                                    <label for="InputEditMailTitulado">Email address</label>
                                    <input type="email" name="EmailTitulado" class="form-control" id="InputEditMailTitulado" aria-describedby="emailHelp" placeholder="Email" value="{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="InputEditDNITitulado">DNI</label>
                                    <input type="text" name="DNITitulado" class="form-control" id="InputEditDNITitulado" placeholder="DNI" value="{{$user->dni}}">
                                </div>
                                <div class="form-group">
                                    <label for="InputEditTelefonTitulado">Telefon</label>
                                    <input type="text" name="TelefonTitulado" class="form-control" id="InputEditTelefonTitulado" placeholder="Telefon" value="{{$user->telefon}}">
                                </div>
                                <div class="form-group">
                                    <label for="isTreballant" class="col-md-2 col-form-label">{{ __('Treballant') }}</label>
                                    <input type="checkbox" id="isTreballant" name="isTreballant[]" class="switch-input" value="{{$user->isTreballant}}" @if($user->isTreballant) checked @endif />
                                </div>
                                <div class="form-group">
                                    <label for="isCoordinador" class="col-md-2 col-form-label">{{ __('Coordinador?') }}</label>
                                    <input type="checkbox" id="isCoordinador" name="isCoordinador[]" class="switch-input" value="{{$user->isCoordinador}}" @if($user->isCoordinador) checked @endif />
                                </div>
                            </div>
                            <div class="row-cols-md-3">
                                <button type="submit" class="btn btn-primary mt-5">Submit</button>
                                <button type="button" class="btn btn-primary mt-5" onclick="window.location='/fitxa/estudis'">Llista estudis</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
