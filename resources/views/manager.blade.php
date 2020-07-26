@extends('layouts.app')

@section('content')


<div class="container">
    <p style="font-size: 20px;text-align: center" class="text-success p_cen">{{session('msg') ?? ''}}</p>
    <a class="create_link" href="{{ route('create_task') }}"><h2>Create Task</h2></a>

    <h1 style="text-align: center">Manager</h1>

    <div class="row justify-content-center">
        <div class="col-md-12" style="display: contents">
    @forelse($product as $prod)

        <div class="card col-md-3" style="width: 18rem;margin: 8px">
            <div class="card-body">
                <h5 class="card-title">{{ $prod->task_name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">manager {{ $prod->manager_name }}</h6>
                <h6 class="card-subtitle mb-2 text-success">for {{ $prod->assigned_user_name }}</h6>
                <h6 class="card-subtitle mb-2 text-info">status-{{ $prod->status ?? 'new' }}</h6>
                <hr>
                <p class="card-text">{{ $prod->description }}</p>
                <hr>

                <a class="btn btn-warning" href="{{ route('edit',$prod->id)  }}">Change</a>
                <form style="display: inline-block" action="{{ route('destroy',$prod->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input  type="submit" class="btn btn-danger" value="Delete">
                </form>
            </div>
        </div>

    @empty
        <h1 class="no_prod">No Task</h1>
    @endforelse

</div>
    </div>


</div>




@endsection
