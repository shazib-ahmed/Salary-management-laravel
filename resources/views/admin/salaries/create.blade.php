@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
            <h1 class="h3 mb-0 text-gray-800">{{ __('create salary') }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.salaries.index') }}" class="btn btn-primary">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.salaries.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="player">{{ __('player') }}</label>
                        <select name="player_id" class="form-control" id="player">
                            @foreach($players as $id => $player)
                                <option value="{{ $id }}">{{ $player }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="team">{{ __('team') }}</label>
                        <select name="team_id" class="form-control" id="team">
                            @foreach($teams as $id => $team)
                                <option value="{{ $id }}">{{ $team }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="season">{{ __('season') }}</label>
                        <select name="season_id" class="form-control" id="season">
                            @foreach($seasons as $id => $season)
                                <option value="{{ $id }}">{{ $season }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="salary">{{ __('salary') }}</label>
                        <input type="number" class="form-control" id="salary" placeholder="{{ __('salary') }}" name="salary" value="{{ old('salary') }}" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection