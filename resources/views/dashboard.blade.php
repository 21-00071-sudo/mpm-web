@extends('layouts.dashboard')

@section('content')
    <div>
        <h1 class="text-4xl font-bold mb-6">
            Hello, {{ $user->name }}!
        </h1>
    </div>
@endsection
