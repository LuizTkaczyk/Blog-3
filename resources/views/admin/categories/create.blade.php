@extends('adminlte::page')

@section('title', 'Laravel bolado')

@section('content_header')
    <h1>Criar categoria</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {{-- CRIANDO FORMULARIO COM O PACOTE  LARAVEL COLLECTIVE --}}
            {!! Form::open(['route' => 'admin.categories.store','autocomplete'=>'off']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nome') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Digite o nome da categoria']) !!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                    
                @enderror



            </div>

            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Digite o slug da categoria', 'readonly']) !!}

                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                    
                @enderror


            </div>

            {!! Form::submit('Criar categoria', ['class' => 'btn btn-primary']) !!}


            {!! Form::close() !!}
        </div>
    </div>

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
