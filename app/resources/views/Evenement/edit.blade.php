@extends('layout')
@section('title','edit evenement')
@section('content')


<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-1"><h1>Update evenement</h1>
    </div>
<div class="flex justify-center">
    <form action="{{ route('evenement.update',['evenement'=>$evenement->id]) }}" method="POST" enctype="multipart/form-data" class="formbg-white p-6 border-1">
        @method('PUT')
        @csrf
        <div>
        <label for="evenement titre">titre d'evenement </label>
        <input id="evenement titre"  class="form-control" value="{{$evenement['titre']}}" name="evenement-titre" type="text">
        </div>
        <div>
        <label for="evenement prix">Prix</label>
        <input id="evenement prix"  class="form-control" value="{{$evenement['prix']}}"  name="evenement-prix" type="text">
        </div>
        <div>
            <label for="evenement lieu">lieu</label>
            <input id="evenement lieu"  class="form-control" value="{{$evenement['lieu']}}" name="evenement-lieu" type="text">
            </div>
            <div>
                <label for="evenement type">type</label>
                <input id="evenement type"  class="form-control" value="{{$evenement['type']}}"  name="evenement-type" type="text">
                </div>
                <div>
                    <label for="evenement temps">Date</label>
                    <input id="evenement temps" class="form-control" value="{{$evenement['temps']}}"  name="evenement-temps" type="date">
            </div>
            <div>
                <label for="evenement desc">Description</label>
                <textarea id="evenement desc" class="form-control"value="{{$evenement['description']}}"  name="evenement-desc" ></textarea>
        </div>
            <div>
                <label for="evenement image">image</label>
                <input id="evenement image"  class="form-control"  name="evenement_image" type="file">
        </div>
        <div>
        <button class="btn btn-success m-2" type="submit">Submit</button>
        </div>
    </form>
</div>
            @endsection
