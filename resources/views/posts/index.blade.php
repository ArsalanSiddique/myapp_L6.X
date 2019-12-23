@extends('layouts.posts')
@section('title', 'Static data from posts controller')
@section('content')

@component('components.messages', ['title' => '<span>Error Message</span>'])
    <strong>Warning</strong> Something went wrong.
@endcomponent
    <ul>
        <li>{{$data['name']}}</li>
        <li>{{$data['Company']}}</li>
    </ul>
@endsection