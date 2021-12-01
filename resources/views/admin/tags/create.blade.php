@extends('adminlte::page')

@section('title', 'Laravel')

@section('content_header')
    <h1>Criar tag</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.tags.store','autocomplete'=>'off']) !!}

            @include('admin.tags.partials.form')

            {!! Form::submit('Criar tag', ['class' => 'btn btn-primary']) !!}


            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

{{-- USANDO O JQUERY PARA CRIAR O SLUG (URL AMIGAVEL) --}}
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
