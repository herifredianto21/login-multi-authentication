@extends('dashboards.users.layouts.user-dash-layout')
@section('title', 'Dashboard')

@section('content')
    <h1> Hello {{Auth::user()->name }}! </h1>
@endsection