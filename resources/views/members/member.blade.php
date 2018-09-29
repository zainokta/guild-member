@extends('layouts.app')

@section('content')
<div class="container">
    <div class="space">
        <h1 class="text-center">MY GUILD MEMBER</h1>
        <a class="btn btn-basic" href="/member/create">Insert New Member</a>
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
                    <td class="text-center align-middle"> <a class="btn btn-basic" href="/member/{{$member->id}}">Show Details</a></td>
                    <td class="text-center align-middle"> <a class="btn btn-basic" href="/member/{{$member->id}}/edit">Edit</a></td>
                    <td class="text-center align-middle">
                        <form method="post" action="{{ route ('members.delete', [$member->id]) }}">
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
@endsection