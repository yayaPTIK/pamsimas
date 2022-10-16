@extends('layouts.app')
@section('content')
    <div class="card  col-8 shadow mb-4 m-auto">
        <div class="card-header">Input Data Block</div>
        <div class="card-body col-12">
                <form action="{{route('block.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nama block</label>
                                <input type="text" class="form-control" name="name" placeholder="block" required autofocus>
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