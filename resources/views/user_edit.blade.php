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
            <form action="{{ route('user_update',$product->id) }}" method="POST" >
                @method('PUT')
                @csrf
                <div>
                    <label for="status">Choose a status</label>
                    <select id="status" name="option">
                        <option  value="Watched">Watched</option>
                        <option value="In progress">In progress</option>
                        <option value="Done" >Done</option>
                    </select>
                </div>

                <div>
                    <label for="desc">Description</label>
                    <textarea style="width: 400px;height: 100px;resize: none;" type="text"  id="desc" name="desc" required>{{ $product->description }}</textarea><br>
                </div>
                <hr>
                <input type="submit" value="Save" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection


