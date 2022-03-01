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
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($empreses as $empresa)
                                <tr id="{{$empresa->IdEmpresa}}">
                                    <td> {{$empresa->nom}} </td>
                                    <td> {{$empresa->email}} </td>
                                    <td>
                                        <button type="button" class="btn btn-success" onclick="editEmpresa({{$empresa->IdEmpresa}})"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
