@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar estudi') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form  method="POST" action="/estudi/editEstudi">
                            @csrf
                            <input type="number" name="IdEstudi" style="display: none" value="{{$estudi->IdEstudi}}"/>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="InputEditNameEstudi">Nom</label>
                                    <input type="text" name="NameEstudi" class="form-control" id="InputEditNameEstudi" placeholder="Nom" value="{{$estudi->nom}}">
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
