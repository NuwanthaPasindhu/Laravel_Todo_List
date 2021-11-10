@extends('layout.layout')

@section('contents')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center text-primary">Todo</h1>
        </div>
    </div>

    <div class="row">
      <form action="{{ route('todo.add') }}" method="post">
          @csrf
        <div class="col-lg-12 my-2">
            <input type="text" class="form-control" name="Title" />
        </div>
        <div class="col-lg-4">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
</div>
</div>
<div class="container-fluid">

<table class="table table-dark my-3 table-striped table-horver">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Complete</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
            @foreach ($tasks as $task )
            <tr>
              <td scope="col">{{$task->id}}</td>
              <td scope="col">{{$task->Title}}</td>
              @if ($task->complete == 0)
              <td scope="col"><label class="badge bg-danger">

            Not Complete
            </label></td>
            @else
            <td scope="col"><label class="badge bg-warning">

           Completed
          </label></td>
              @endif
              <td scope="col">
                  <a href="{{ route('todo.complete',$task->id ) }}" class="btn btn-primary"><i class="fas fa-check"></i></a>
                  <a href="{{ route('todo.notcomplete',$task->id) }}" class="btn btn-warning"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="{{ route('todo.delete',$task->id) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
            @endforeach

    </tbody>
  </table>

</div>


  @endsection

