@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$user->name}}'s Profile</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                  <table class="table table-dark">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Connection</th>
                            </tr>
                          </thead>
                          <tbody>@php $i = 1;@endphp
                            @foreach($user->follower as $key=>$friend)
                              @if($friend->pivot->status === 2)
                                  <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td><a href="{{url('/profile/'.$friend->slug)}}">{{$friend->name}}</a></td>
                                    <td><a href="{{url('/profile/'.$friend->slug)}}">View Profile</a></td>
                                    <td>
                                      @if(in_array($friend->id,Auth::user()->follower->pluck('id')->toArray()))
                                        Mutual
                                      @endif
                                    </td>
                                  </tr>@php $i++;@endphp
                                @endif
                            @endforeach
                            @foreach($user->following as $key => $friend)
                              @if($friend->pivot->status === 2)
                                <tr>
                                  <th scope="row">{{$i}}</th>
                                  <td><a href="{{url('/profile/'.$friend->slug)}}">{{$friend->name}}</a></td>
                                  <td><a href="{{url('/profile/'.$friend->slug)}}">View Profile</a></td>
                                  <td>
                                    @if(in_array($friend->id,Auth::user()->follower->pluck('id')->toArray()))
                                      Mutual
                                    @endif
                                  </td>
                                </tr>@php $i++;@endphp
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
