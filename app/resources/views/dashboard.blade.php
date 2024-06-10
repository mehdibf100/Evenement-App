@php
    $userId = Auth::id();
@endphp

@extends('layout')
@section('title','evenements')
@section('content')
<style>#event_id{
    display:none;
}
</style>
<x-app-layout>
    <x-slot name="header">

        <a class="font-semibold text-xl text-gray-800 leading-tight ">
          {{ __('Accueil') }}    <a class="create" href="{{ route("evenement.create") }}">Créer Un Événement</a>

        </a>
        <a href="{{ route('mesevenements') }}" class="font-semibold text-xl text-gray-800 leading-tight ml-12">
            {{ __('Mes evenements') }}

          </a>
    </x-slot>
    <center>
        <div class="max-w-6xl w-75 mx-auto  m-1 sm:px-6 lg:px-8">
            @if($data && count($data) > 0)
            <ul>
                @foreach ($data as $evenement)
                  <div class="card w-75 mt-3">
                <a href="{{ route('evenement.show',['evenement'=>$evenement['id']]) }}">
                <div class="card-body">
                    @if ($userId==$evenement['user_id'])
                    <div class="dropdown float-end ">
                        <button class="btn btn-light fs-3 " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          ...
                        </button>
                        <ul class="dropdown-menu">
                          <li><form action="{{ route('evenement.destroy',$evenement->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                                <input type="submit" class="dropdown-item" value="Delete">
                            </form></li>
                            <li><form action="{{ route('evenement.edit',$evenement->id) }}">
                                @csrf
                                @method('PUT')
                                    <input type="submit" class="dropdown-item" value="Edit">
                                </form></li>
                        </ul>
                      </div>
                  @endif
                  <h4 class="card-title text-start">{{$evenement['titre']}}</h4>
                  <p class="card-text text-start">
                   <img src="{{ asset('img/localiation.png') }}" class="card-img w-5"> <strong>{{$evenement['lieu']}}</strong>
                  </p>
                  <p class="card-text text-start">
                    <small class="text-muted"><strong>{{$evenement['prix']}} TND</strong></small>
                  </p>
                  <p class="text-start">
                    {{$evenement['description']}}.
                  </p>
                </div>

                <img src="{{ asset('img/' . $evenement->image) }}" class="card-img-bottom w-full" alt="Camera"/>
            </a>
            @if ($userId!=$evenement['user_id'])
            <form action="{{ route('participant.store') }}" method="post">
                @csrf
                <input type="text" name="event_id" id="event_id" value="{{$evenement['id']}}">
            <button type="submit" id="participer-btn" class="btn btn-light w-100">Participer</button>
            </form>
            @endif
        </div>
                @endforeach
            </ul>
        @else
            <p>There are no evenements to display</p>
        @endif

        </div>
        </center>
</x-app-layout>
@endsection
