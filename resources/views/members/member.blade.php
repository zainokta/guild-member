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
                <h1 class="text-center">MY GUILD MEMBER</h1>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th class="text-center align-middle">Name</th>
                        <th class="text-center align-middle">Class</th>
                        <th class="text-center align-middle">Phone</th>
                        <th class="text-center align-middle">Show Member Details</th>
                        <th class="text-center align-middle">Edit Member</th>
                        <th class="text-center align-middle">Delete Member</th>
                    </tr>
                    @if(count($members) <= 0)
                    <tr>
                        <td colspan="6" class="text-center"><strong> No Member(s) yet</strong></td>
                    </tr>
                    @else
                        @foreach ($members as $key => $member)
                        <tr>
                            <td class="text-center align-middle">{{ $member->name }}<br></td>
                            <td class="text-center align-middle">{{ $member->class }}<br></td>
                            <td class="text-center align-middle">{{ $member->phone }}<br></td>
                            <td class="text-center align-middle"> <a class="btn btn-dasic" href="/member/{{$member->id}}">Show Details</a></td>
                            <td class="text-center align-middle"> <a class="btn btn-basic" href="/member/{{$member->id}}/edit">Edit</a></td>
                            <td class="text-center align-middle">
                                <form method="post" action="{{ route ('delete', [$member->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-default" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </body>
</html>
