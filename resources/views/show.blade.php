@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('home') }}">Back</a>
        <div class="row justify-content-center">
            <div class="col-md-12" style="display: contents">

                    <div class="card col-md-3" style="width: 18rem;margin: 8px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->task_name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">manager-{{ $product->manager_name }}</h6>
                            <h6 class="card-subtitle mb-2 text-success">for-{{ $product->assigned_user_name }}</h6>
                            <h6 class="card-subtitle mb-2 text-info">status-{{ $product->status ?? 'new' }}</h6>
                            <hr>
                            <p class="card-text ">{{ $product->description }}</p>
                            <hr>
                        </div>
                    </div>


            </div>
        </div>
    </div>
@endsection

