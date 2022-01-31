@extends('layouts.app')
@section('title', 'Quiz List')
@section('content')
<div class="text-center card card-body">
    <h1>Quiz List</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Duration</th>
                <th scope="col">Manage</th>
            </tr>
        </thead>
        <tbody>
            @php
            $sl=1;
            @endphp
            @foreach($quiz_list as $quiz)
            <tr>
                <th scope="row">{{$sl++}}</th>
                <td><a href="/add-question/{{$quiz->id}}" target="_blank">{{$quiz->title}}</a></td>
                <td>{{$quiz->from_time}}</td>
                <td>{{$quiz->to_time}}</td>
                <td>{{$quiz->duration}} minutes</td>
                <td>
                    <a href="/add-question/{{$quiz->id}}" class="btn btn-primary">Questions</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection