@extends('layouts.app')

@section('content')
<div class="container">
    <div class="content task_content">
        <div class="title m-b-md">
            <h2>
            Create a Task
            </h2>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <p style="font-size: 20px" class="text-danger p_cen">{{session('msg') ?? ''}}</p>
    <form action="{{ route('task_store') }}" method="post" >
        @csrf
        <div>
            <label style="display: block" for="task_name">Task Name</label>
            <input type="text" placeholder="Task name" id="task_name" name="task_name" required>
        </div>
        <div>
        <label style="display: block" for="for">For</label>
        <input type="text" placeholder="User name" id="for" name="for_name" required>
        </div>
        <hr>
        <div>
        <label for="desc">Description</label>
        <textarea style="width: 400px;height: 100px;resize: none;" type="text"  id="desc" name="desc" required></textarea><br>
        </div>

        <hr>
        <input type="submit" value="Save" class="btn btn-success">
    </form>
</div>
</div>
@endsection
