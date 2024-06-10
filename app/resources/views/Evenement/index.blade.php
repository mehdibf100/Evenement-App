@extends('layout')
@section('title','evenements')
@section('content')

<center>
    <div class="max-w-6xl w-75 mx-auto  m-1 sm:px-6 lg:px-8">
        @if(count($data)>0)
        <ul>
            @foreach ($data as $evenement)
              <div class="card w-75 mt-3">
            <a href="{{ route('evenement.show',['evenement'=>$evenement['id']]) }}">
            <div class="card-body">
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
                            @method('DELETE')
                                <input type="submit" class="dropdown-item" value="Edit">
                            </form></li>
                    </ul>
                  </div>
              <h5 class="card-title text-start">{{$evenement['titre']}}</h5>
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
        <button class="btn btn-light">Partisiper</button>
    </div>
            @endforeach
        </ul>
    @else
        <p>There are no evenements to display</p>
    @endif

    </div>
    </center>
@endsection
