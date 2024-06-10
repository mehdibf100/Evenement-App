@extends('layout')
@section('title','evenements')
@section('content')

<center>
    <div class="max-w-6xl w-75 mx-auto  m-1 sm:px-6 lg:px-8">
        @if(count($data)>0)
        <ul>

            <table class="table table-striped">
                <thead>

                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">User</th>
                    <th scope="col">Evenement</th>

                  </tr>
                </thead>

                <tbody>
                    @foreach ($data as $participant)
                    @if($participant['evenement_id']==3)
                  <tr>
                    <td>{{$participant->evenement->titre}}</td>
                    <td>{{$participant->user->name}}</td>
                    <td>{{$participant['evenement_id']}}</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>


        </ul>
    @else
        <p>There are no evenements to display</p>
    @endif

    </div>
    </center>
@endsection
