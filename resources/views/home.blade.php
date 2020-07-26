@extends('layouts.app')

@section('content')
<div class="container">


        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <p style="font-size: 20px;text-align: center" class="text-success p_cen">{{session('msg') ?? ''}}</p>
            <div style="margin-left: 100px;" class="col-sm-3 md-form mt-0">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="sample_search" id="sample_search" >
            </div>
                        <div class="row justify-content-center">

                            <div class="col-md-12" style="display: contents">

                                @forelse($product as $prod)

                                    <div class="card col-md-3" style="width: 18rem;margin: 8px">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $prod->task_name }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">manager-{{ $prod->manager_name }}</h6>
                                            <h6 class="card-subtitle mb-2 text-success">for-{{ $prod->assigned_user_name }}</h6>
                                            <h6 class="card-subtitle mb-2 text-info">status-{{ $prod->status ?? 'new' }}</h6>
                                            <hr>
                                            <p class="card-text size">{{ $prod->description }}</p>
                                            <hr>
                                            @if($prod->assigned_user_name == $auth)
                                            <a class="btn btn-warning" href="{{ route('edit_user',$prod->id)  }}">Change</a>
                                            @endif
                                            <a class="btn btn-success" href="{{ route('show',$prod->id) }} ">More</a>
                                        </div>
                                    </div>
                                @empty
                                    <h1 class="no_prod">No Task</h1>
                                @endforelse

                            </div>
                        </div>
                </div>
@endsection
