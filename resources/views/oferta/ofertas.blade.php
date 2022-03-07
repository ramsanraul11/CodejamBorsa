@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row row-cols-2 justify-content-evenly">
                        <div class="col-9 align-self-center">{{ __('Ofertes') }}</div>
                        <div class="col-3"><button class="btn btn-outline-dark" type="button" onclick="enviarOfertas()">Enviar ofertes pendents <i class="fa-solid fa-paper-plane"></i></button></div>
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
                                <th>Descripcio</th>
                                <th>PendentEnviament</th>
                                <th>IdEmpresa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ofertes as $oferta)
                                <tr id="{{$oferta->IdOferta}}">
                                    <td> {{$oferta->descripcio}} </td>
                                    <td> {{$oferta->pendentEnviament}} </td>
                                    <td> {{$oferta->IdEmpresa}} </td>
                                    @if(Auth::user()->isCoordinador == true)
                                    <td>
                                        <button type="button" class="btn btn-success" onclick="editOferta({{$oferta->IdOferta}})"><i class="fas fa-edit"></i></button>
                                    </td>
                                    @endif
                            @endforeach
                            </tbody>
                        </table>
                        {{-- Pagination --}}
{{--                        <div class="d-flex justify-content-center">--}}
{{--                            {{ $ofertes->links('pagination::bootstrap-4')}}--}}
{{--                        </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
