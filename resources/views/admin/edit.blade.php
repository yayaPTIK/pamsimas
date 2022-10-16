@extends('layouts.app')

@section('content')
<div class="container mt-0 mb-0">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="col-md-6">
                @if(session('successMsg'))
                    <div class="alert alert-info">
                        <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">x</button>
                        <span>
                            {{session('successMsg')}}
                        </span>
                    </div>
                @endif
            </div>
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Update Pelanggan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update.store',$user->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('No. Hp') }}</label>

                            <div class="col-md-6">
                                <input id="hp" type="text" class="form-control @error('hp') is-invalid @enderror" name="hp" value="{{ $user->hp }}" required>

                                @error('hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <select name="alamat" id="" class="form-control">
                                    <option value=""></option>
                                    @foreach ($block as $blok)
                                        <option value="{{$blok->name}}" 
                                            @if ($user->alamat == $blok->name)
                                                {{'selected="selected"'}}
                                            @endif
                                            >
                                            {{$blok->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Layanan') }}</label>

                            <div class="col-md-6">
                                <select name="layanan" id="layanan" class="form-control">
                                    @foreach ($layanan as $item)
                                        <option value="{{$item->id}}"
                                            @if ($user->layanan_id == $item->id)
                                                {{'selected="selected"'}}
                                            @endif
                                            >
                                            {{$item->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a href="{{route('showUser')}}" class="btn btn-info">
                                    {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
