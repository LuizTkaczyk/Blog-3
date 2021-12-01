@extends('adminlte::page')

@section('title', 'Laravel')

@section('content_header')
    <h1>Criar postagem</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- CRIANDO FORMULARIO COM O PACOTE  LARAVEL COLLECTIVE --}}
            {!! Form::open(['route' => 'admin.posts.store','autocomplete'=>'off']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nome:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Insira o nome do post']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Nome:') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder'=>'Confira o slug do post', 'readonly']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

{{-- USANDO O JQUERY PARA CRIAR O SLUG (URL AMIGAVEL)--}}
@section('js')
    <script src="{{ asset('vendor/jQuery/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection
