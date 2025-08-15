@extends('layouts.dashboard')

@section('title')
    <span>
        Hello, {{ $user->name }}!
    </span>
@endsection
