@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row row-cols-2 justify-content-evenly">
                            <div class="col-9 align-self-center">{{ __('Estudis') }}</div>
                            <div class="col-3"><button class="btn btn-outline-dark" type="button" onclick="addEstudi()">Afegir estudi <i class="fa-solid fa-plus"></i></button></div>
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
                                <th>Nom estudi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($estudis as $estudi)
                                <tr id="{{$estudi->IdEstudi}}">
                                    <td> {{$estudi->nom}} </td>
                                    <td>
                                        <button type="button" class="btn btn-success" onclick="editEstudi({{$estudi->IdEstudi}})"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{-- Pagination --}}
                        <div class="d-flex justify-content-center">
                            {{ $estudis->links('pagination::bootstrap-4')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
