@if(count($user))
  <table class="table table-dark" style="background-color: #f5efef;">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>@php $i = 1;@endphp
      @foreach($user as $key=>$users)
        <tr>
          <th scope="row">{{$i}}</th>
          <td>{{$users->name}}</td>
          <td>{{$users->email}}</td>
          <td><a href="{{ url('/addfriends/'.$users->id)}}">Add friend</a></td>
        </tr>@php $i++;@endphp
      @endforeach
    </tbody>
  </table>
@else
  <div class="col-md-12">
    <p style="color: red;">{{$message}}</p>
  </div>
@endif
