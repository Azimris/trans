@extends('layouts.app')
  <style type="text/css">
    body{
      background-image: url('img/friends1.jpg');
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="background-color: #e2ebf0;">
                <div class="panel-heading">My Friends</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($user))
                      <table class="table table-dark">
                          <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Friend</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>@php $i = 1;@endphp
                                @foreach($user->follower as $key=>$friend)
                                  @if($friend->pivot->status === 2)
                                      <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td><a href="{{url('/profile/'.$friend->slug)}}">{{$friend->name}}</a></td>
                                        <td><a href="{{url('/profile/'.$friend->slug)}}">View Profile</a></td>
                                      </tr>@php $i++;@endphp
                                    @endif
                                @endforeach
                                @foreach($user->following as $key => $friend)
                                  @if($friend->pivot->status === 2)
                                    <tr>
                                      <th scope="row">{{$i}}</th>
                                      <td><a href="{{url('/profile/'.$friend->slug)}}">{{$friend->name}}</a></td>
                                      <td><a href="{{url('/profile/'.$friend->slug)}}">View Profile</a></td>
                                    </tr>@php $i++;@endphp
                                    @endif
                                @endforeach
                          </tbody>
                      </table>
                  @else
                    No Friends found, wait until they accept ! or you can accept other's request also!
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
