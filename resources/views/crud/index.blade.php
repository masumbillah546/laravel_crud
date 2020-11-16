<!-- index.blade.php -->

@extends('master')
@section('content')
<div class="container">
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Posts</th>
      <th colspan="2">Action</th>
    </tr> 
     @foreach($data as $post)
    <tr>

      <td>{{$post['id']}}</td>
      <td>{{$post['title']}}</td>
      <td>{{$post['post']}}</td>
      <td><a href="crud/{{$post['id']}}/edit" class="btn  btn-info"><i class="glyphicon glyphicon-edit"></i></a></td>
      <td><a href="destroy/{{$post['id']}}/" class="btn  btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
      <!-- <td><a href="{{action('CRUDController@destroy', $post['id'])}}" class="btn  btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td> -->

     <!--  <td>
          <form action="{{action('CRUDController@destroy', $post['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-trash"></i></button>
          </form>
        </td> -->
      
    </tr>
    @endforeach
  </table>
  <a href="{{url('crud/create')}}" class="btn btn-success">New Entry</a>
</div>
@endsection