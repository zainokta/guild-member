@extends('layouts.app')

@section('content')
<div class="container">
    <div class="space">
        <h1>SHOWING {{ $member->name }} </h1>
        <div class="jumbotron text-center">
            <h2>{{ $member->name }}</h2>
            <p>
                <strong>Class : </strong> {{ $member->class }} <br>
                <strong>Phone : </strong> {{ $member->phone }}
            </p>
        </div>
    </div>
</div>
@endsection