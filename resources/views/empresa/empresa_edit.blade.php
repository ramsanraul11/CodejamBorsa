@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Empreses') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        Copy
                        <form  method="POST" action="/empresa/editEmpresa">
                            @csrf
                            <input type="number" name="IdEmpresa" style="display: none" value="{{$empresa->IdEmpresa}}"/>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="InputEditNameEmpresa">Nom</label>
                                    <input type="text" name="NameEmpresa" class="form-control" id="InputEditNameEmpresa" placeholder="Nom" value="{{$empresa->nom}}">
                                </div>
                                <label for="InputEditMailEmpresa">Email address</label>
                                <input type="email" name="MailEmpresa" class="form-control" id="InputEditMailEmpresa" aria-describedby="emailHelp" placeholder="Email" value="{{$empresa->email}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
