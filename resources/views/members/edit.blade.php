<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('member') }}">GUILD</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('member') }}">View All Members</a></li>
                <li><a href="{{ URL::to('member/create') }}">Insert New Member</a>
            </ul>
        </nav>
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
                <form action="{{ route('update', [$member->id]) }}" method="post">
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
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>
