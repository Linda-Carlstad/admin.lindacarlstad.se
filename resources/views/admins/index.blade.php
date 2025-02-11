@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h2>Admin konton</h2>
        <hr>
        <a class="btn btn-primary m-1" href="{{ route('admins.create') }}">Lägg till admin</a>
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
                        <td
                            class="d-flex flex-row justify-content-end align-items-start flex-wrap"
                            style="gap: 1em;">
                            <a
                                href="{{ route('admins.edit', $admin->id) }}"
                                class="btn btn-primary d-inline-block">
                                Ändra lösenord
                            </a>
                            <form
                                class="d-inline-block"
                                onSubmit="return confirm('Är su säker på att du vill ta bort den här adminen? Denna åtgärd är permanent.');"
                                action="{{ route('admins.destroy', $admin) }}"
                                method="post">
                                @csrf
                                {{ method_field( 'delete' ) }}
                                <button type="submit" class="btn btn-danger">
                                    Ta bort
                                </button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif
    <hr>




@endsection
