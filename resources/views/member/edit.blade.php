@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>{{ $member->name }}</h2>
    </div>
    <form class="" action="{{ 'member' }}" method="post">
        <div class="form-group">
            <input type="text" name="name" value="" placeholder="{{ $member->name }}">
        </div>
    </form>

@endsection
