@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h2>Admin konton</h2>
        <hr>
    </div>

    @if( $admins->isEmpty() )
        <p class="text-center">
            Inga Admins skapade...
        </p>
    @else
        <h4 class="text-center">Admins: {{ $admins->count() }}</h4>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>email</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $admin->email }}</td>
                        <td>
                            <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-primary">
                                Ändra lösenord
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif
    <hr>




@endsection
