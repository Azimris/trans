@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pending Request</div>

                <div class="panel-body"  style="background-color: #f5efef;">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($pendingRequest))
                      <table class="table table-dark">
                          <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Friend Request</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>@php $i = 1;@endphp
                              @foreach($pendingRequest as $key=>$request)
                                  <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$request->name}}</td>
                                    <td><a href="{{url('/acceptRequest/'.$request->id)}}">Accept</a></td>
                                  </tr>@php $i++;@endphp
                              @endforeach
                          </tbody>
                      </table>
                    @else
                      No pending request found
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
