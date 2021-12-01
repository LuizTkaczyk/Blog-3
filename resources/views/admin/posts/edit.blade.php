@extends('adminlte::page')

@section('title', 'Laravel')

@section('content_header')
    <h1>Editar postagem</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- CRIANDO FORMULARIO COM O PACOTE  LARAVEL COLLECTIVE --}}
            {{-- Para um form de edição usar a diretiva ::model --}}
            {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'autocomplete' => 'off', 'files' => true,'method' =>'put']) !!}

            {!! Form::hidden('user_id', auth()->user()->id) !!}

            {{-- trazendo o formulario de partials/form --}}
            @include('admin.posts.partials.form')

            {!! Form::submit('Atualizar postagem', ['class' => 'btn btn-primary']) !!}


            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 5%;

        }

        .image-wrapper img {
            position: relative;
            object-fit: cover;
            width: 80%;
            height: 80%;
        }

    </style>
@stop

{{-- USANDO O JQUERY PARA CRIAR O SLUG (URL AMIGAVEL) --}}
@section('js')
    <script src="{{ asset('vendor/jQuery/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        // scripts para usar o pacote do CKEditor 5
        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });

        //mudar imagem
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
@endsection
