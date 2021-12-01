@extends('adminlte::page')

@section('title', 'Laravel')

@section('content_header')
    <h1>Criar postagem</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- CRIANDO FORMULARIO COM O PACOTE  LARAVEL COLLECTIVE --}}
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off']) !!}

            {!! Form::hidden('user_id', auth()->user()->id) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nome:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Insira o nome do post']) !!}

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label('slug', 'Slug:') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Confira o slug do post', 'readonly']) !!}

                @error('slug')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            {{-- mostrando as categorias cadastradas no banco de dados --}}
            <div class="form-group">
                {!! Form::label('category_id', 'Categoria') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="form-group">
                <p class="font-weight-bold">Tags</p>

                @foreach ($tags as $tag)
                    <label class="mr-2">
                        {!! Form::checkbox('tags[]', $tag->id, null) !!}
                        {{ $tag->name }}
                    </label>
                @endforeach
                <hr>

                @error('tags')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="form-group">
                <p class="font-weight-bold">Status</p>

                <label class="mr-3">
                    {!! Form::radio('status', 1, true) !!}
                    Não publicado
                </label>

                <label>
                    {!! Form::radio('status', 2) !!}
                    Publicado
                </label>
                <hr>

                @error('status')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="row">
                <div class="col">
                    <div class="image-wrapper">
                        <img src="https://cdn.pixabay.com/photo/2017/10/18/18/20/death-2865060_960_720.png" alt="">
                    </div>
                    
                </div>

                <div class="col">
                    <div class="form-group">
                        {!! Form::label('file', 'Imagem do post') !!}
                        {!! Form::file('file', ['class' => 'form-control-file']) !!}
                    </div>
                    
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('extract', 'Descrição') !!}
                {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

                @error('extract')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('body', 'Postagem') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

                @error('body')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {!! Form::submit('Criar postagem', ['class' => 'btn btn-primary']) !!}


            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 5%;
           
        }

        .image-wrapper img{
            position: relative;
            object-fit: cover;
            width: 50%;
            height: 50%;
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
    </script>
@endsection
