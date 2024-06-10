@php
    $userId = Auth::id();
@endphp
@extends('layout')
@section('title','evenements')
@section('content')
<style>
    .card-img {
        width: 20px;
        margin-left: 2px;
    }
    a {
        text-decoration: none;
        color: black;
    }
</style>
<center>
    <div class="max-w-6xl w-75 mx-auto m-1 sm:px-6 lg:px-8">
        @if($data && count($data) > 0)
        <ul>
            @foreach ($data as $evenement)
            @if ($userId == $evenement['user_id'])
              <div class="card w-75 mt-3">
                <a href="{{ route('evenement.show', ['evenement' => $evenement['id']]) }}">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <button class="btn btn-light fs-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              ...
                            </button>
                            <ul class="dropdown-menu">
                              <li>
                                  <form action="{{ route('evenement.destroy', $evenement->id) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <input type="submit" class="dropdown-item" value="Delete">
                                  </form>
                              </li>
                              <li>
                                  <a href="{{ route('evenement.edit', $evenement->id) }}" class="dropdown-item">Edit</a>
                              </li>
                            </ul>
                        </div>
                        <h4 class="card-title text-start">{{ $evenement['titre'] }}</h4>
                        <p class="card-text text-start">
                           <img src="{{ asset('img/localiation.png') }}" class="card-img"> <strong>{{ $evenement['lieu'] }}</strong>
                        </p>
                        <p class="card-text text-start">
                            <small class="text-muted"><strong>{{ $evenement['prix'] }} TND</strong></small>
                        </p>
                        <p class="text-start">
                            {{ $evenement['description'] }}.
                        </p>
                    </div>
                    <img src="{{ asset('img/' . $evenement->image) }}" class="card-img-bottom w-full" alt="Event Image"/>
                </a>
                <a href="/participant" class="btn btn-light">Voir les Participants</a>
              </div>
            @endif
            @endforeach
        </ul>
        @endif
    </div>
</center>
@endsection
