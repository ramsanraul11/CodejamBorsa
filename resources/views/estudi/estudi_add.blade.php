@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Afegir estudi nou') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form  method="POST" action="/estudi/add">
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="InputEditNameEstudi">Nom</label>
                                    <input type="text" name="NameEstudi" class="form-control" id="InputEditNameEstudi" placeholder="Nom" required>
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
