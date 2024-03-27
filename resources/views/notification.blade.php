@extends('layouts.app')

@section('content')
    <notifications :notifications="{{ $notifications }}"></notifications>
@endsection
