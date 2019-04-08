@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Medlemmar</h2>
    </div>
    <hr>
    <div>
        <ul class="list-group list-group-flush">
              <li class="list-group-item">
                  <a href="#">Lägg till medlem</a>
              </li>
              <li class="list-group-item">
                  <a href="#">Redigera medlem</a>
              </li>
              <li class="list-group-item">
                  <a href="#">Visa medlemmar</a>
              </li>
        </ul>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Namn</th>
                    <th>Personnummer</th>
                    <th>Mail</th>
                    <th>Medlemskap</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->id_number }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->membership }} : {{ $member->start }}</td>
                        <td>
                            <a href="{{ url( 'member/' . $member->id . '/edit') }}" class="btn btn-link">Edit</a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
        {{ $members->links() }}
    </div>

@endsection
