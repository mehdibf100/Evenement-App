@extends('layout')
@section('title','create evenement')
@section('content')


<div class="max-w-6xl mx-auto sm:px-6 w-50  lg:px-8 border-1">
    <div class="flex justify-center pt-1"><h1>Create a new evenement</h1>
    </div>
<div class="flex justify-center">
    <form action="{{ route('evenement.store') }}" method="post" enctype="multipart/form-data" class="formbg-white p-6 border-1">
        @csrf
        <div>
        <label for="evenement titre">titre d'evenement </label>
        <input id="evenement titre"  class="form-control" value="{{ old('evenement-titre') }}"  name="evenement-titre" type="text">
            @error('evenement-titre')
            <div class="form-err">
            Saisir le titre
            </div>
            @enderror
        </div>
        <div>
        <label for="evenement prix">Prix</label>
        <input id="evenement prix"  class="form-control" value="{{ old('evenement-prix') }}" name="evenement-prix" type="text">
        @error('evenement-prix')
        <div class="form-err">
        Saisir le prix
    </div>
        @enderror
    </div>
        <div>
            <label for="evenement lieu">lieu</label>
            <input id="evenement lieu"  class="form-control" value="{{ old('evenement-lieu') }}" name="evenement-lieu" type="text">
            @error('evenement-lieu')
            <div class="form-err">
            Saisir le lieu
        </div>
            @enderror
        </div>
            <div>
                <label for="evenement type">type</label>
                <input id="evenement type"  class="form-control" value="{{ old('evenement-type') }}"  name="evenement-type" type="text">
                @error('evenement-type')
                <div class="form-err">
                Saisir le type
            </div>
                @enderror
            </div>
                <div>
                    <label for="evenement temps">Date</label>
                    <input id="evenement temps" class="form-control" value="{{ old('evenement-date') }}" name="evenement-temps" type="date">
                    @error('evenement-temps')
                    <div class="form-err">
                    Saisir le temps
                </div>
                    @enderror
                </div>
            <div>
                <label for="evenement desc">Description</label>

                <input type="text" id="evenement desc" class="form-control w-9 h-10" value="{{ old('evenement-desc') }}" name="evenement-desc" >
                @error('evenement-desc')
                <div class="form-err">
                Saisir le description
            </div>
                @enderror
            </div>
            <div>
                <label for="evenement image">image</label>
                <input id="evenement image"  class="form-control"  name="evenement_image" type="file">

                @error('evenement-titre')
                <div class="form-err">
                ajouter l'image</div>
                @enderror     </div>
        <div>
        <button class="btn btn-success m-2" type="submit">Submit</button>
        </div>
    </form>
</div>
            @endsection
