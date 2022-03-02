@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Afegir empresa nova') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form  method="POST" action="/empresa/add">
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="InputEditNameEmpresa">Nom</label>
                                    <input type="text" name="NameEmpresa" class="form-control" id="InputEditNameEmpresa" placeholder="Nom" required>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="InputEditMailEmpresa">Email address</label>
                                    <input type="email" name="MailEmpresa" class="form-control" id="InputEditMailEmpresa" aria-describedby="emailHelp" placeholder="Email" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
