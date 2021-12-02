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
            @isset ($post->image)
                <img id="picture" src="{{ url('storage/' . $post->image->url) }}" alt="">
            @else

                <img id="picture" src="https://cdn.pixabay.com/photo/2019/02/28/04/54/car-4025379_960_720.png" alt="">

            @endisset
        </div>

    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagem do post') !!}
            {{-- com 'image/*' ao escolher os arquivos, apareceram somente imagens --}}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            
            @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos rerum et culpa blanditiis aliquid saepe
            quisquam laborum, doloribus corrupti dicta.</p>
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
