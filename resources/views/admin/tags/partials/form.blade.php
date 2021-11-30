<div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Insira o nome da Tag...']) !!}

    @error('name')
        <small class="text-danger">{{ $message }}</small>

    @enderror

</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Insira o slug da Tag...', 'readonly']) !!}

    @error('slug')
        <small class="text-danger">{{ $message }}</small>

    @enderror
</div>

<div class="form-group">
    {{-- <label for="">Cor da tag</label>
    <select name="color" id="" class="form-control">
        <option value="blue">Azul</option>
        <option value="green">Verde</option>
        <option value="red">Vermelho</option>
    </select> --}}

    {!! Form::label('color', 'Cor') !!}
    {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}

    @error('color')
        <small class="text-danger">{{ $message }}</small>

    @enderror
</div>
