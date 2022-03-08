@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row row-cols-2 justify-content-evenly">
                            <div class="col-9 align-self-center">{{ __('Estudiants') }}</div>
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
                                <th>Nom</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th>DNI</th>
                                <th>Telefon</th>
                                <th>Treballa?</th>
                                <th>CV</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr id="{{$user->id}}">
                                    <td> {{$user->name}} </td>
                                    <td> {{$user->surname}} </td>
                                    <td> {{$user->email}} </td>
                                    <td> {{$user->dni}} </td>
                                    <td> {{$user->telefon}} </td>
                                    @if($user->isTreballant)
                                        <td> Si </td>
                                    @else
                                        <td> No </td>
                                    @endif

                                    @if($user->nameFile == null)
                                        <td> - </td>
                                    @else
                                        <td> {{$user->pathFile}} / {{$user->nameFile}} </td>
                                    @endif
                                    <td>
                                        <button type="button" class="btn btn-success" onclick="editEstudiant({{$user->id}})"><i class="fas fa-edit"></i></button>
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
