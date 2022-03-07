@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar CV para '.$user->name." ".$user->surname) }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form  method="POST" action="/fitxa/CV" enctype="multipart/form-data">
                            @csrf
                            <input type="number" name="IdTitulado" style="display: none" value="{{$user->id}}"/>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="file">Adjuntar CV</label>
                                    <input type="file" name="pdf" class="form-control" id="file">
                                </div>

                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-primary col-sm-4 mt-5">Update</button>
                                @if($user->nameFile!=null)
                                    <a class="btn btn-success col-sm-4 offset-1 mt-5" href="{{url('/fitxa/download',$user->nameFile)}}">Descarregar últim CV</a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
