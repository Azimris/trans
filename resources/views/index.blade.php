@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="background-color: transparent; border:none;">
                <br><br>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                      <div class=" col-md-6 col-md-offset-3 form-group has-feedback">
                        <p>Search Friends :</p>
                        <input type="text" id="name" class="form-control" autocomplete="off" name="search" id="search" placeholder="search..">
                      </div>
                      <div class=" col-md-6 col-md-offset-3  form-group has-feedback">
                          <input type="submit" id="submit" class="form-control btn-success" name="">
                          <p>Note: Only no friend/request user will be shown on query</p>
                      </div>
                      <div id="search"> </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#submit').click(function(){
              var name = $('#name').val();
              $.ajax({
                url:'{!! url('search') !!}',
                type:'GET',
                data:{name:name},
              }).done(function(res){
                $('#search').html(res.data);
              })
            });
        })
    </script>
@endsection
