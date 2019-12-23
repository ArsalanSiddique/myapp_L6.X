@extends('layouts.posts')
@section('title', 'Show Record via show method')
@section('content')
    <ul>
        <li><b>Title: </b>{{$data['name']}}</li>
        <li><b>Content: </b>{{$data['content']}}</li>
        <li><b>Gender: </b>{{$data['gender']}}</li>
        <li><b>SKills: </b>
            @php
                $i = 0;
                $count = count($data['skills']);
                while($i < $count ){ echo $data['skills'][$i].' ';  $i++; } 
            @endphp
        </li>
        <li><b>Profile: </b>{{$data['profile']}}</li>
    </ul> 
@endsection