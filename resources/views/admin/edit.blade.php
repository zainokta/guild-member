@extends('layouts.app')

@section('content')
<div class="container">
    <div class="space">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
             @endforeach
            </ul>
        @endif
        <form action="{{ route('admins.update', [$member->id]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH"/>
            <div class="form-group">
                <label for="name">Name : </label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{$member->name}}" required>
            </div>
            <div class="form-group">
                <label for="class">Class : </label>
                <input type="text" name="class" class="form-control" placeholder="Class" value="{{$member->class}}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone : </label>
                <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{$member->phone}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
