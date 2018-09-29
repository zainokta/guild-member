<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Member List</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
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
    </body>
</html>
