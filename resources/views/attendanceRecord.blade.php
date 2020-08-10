@extends('layouts.app')

@section('content')
<div class="container align-self-center">
    <h3>Fiche de présence</h3>
    <div class="input-group col-md-4">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Sélectionnez votre classe :</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01">
            <option selected>...</option>
            @foreach ($classrooms as $classroom)
                <option value="{{ $classroom->id }}">
                    {{ $classroom->id }}
                </option>
            @endforeach
        </select>
    </div>

    <form>
        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Votre code :</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
    </form>
</div>

@endsection
