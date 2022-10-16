@extends('layouts.app')
@section('content')
    <div class="card  col-8 shadow mb-4 m-auto">
        <div class="card-header">Edit Data Block</div>
        <div class="card-body col-12">
                <form action="{{route('block.update',$block->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nama block</label>
                                <input type="text" class="form-control" value="{{$block->name}}" name="name" placeholder="block" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection