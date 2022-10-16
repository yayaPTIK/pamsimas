@extends('layouts.app')
@push('style')
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css"> --}}
@endpush
@section('headerPage','List Block')
@section('content')
    <div class="row">
        @foreach ($lists as $list)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <a href="{{route('tagihan.index', $list->name)}}">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$list->name}}</div>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection