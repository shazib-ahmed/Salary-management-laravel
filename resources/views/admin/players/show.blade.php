@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
   

    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('player') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.players.index') }}" class="btn btn-primary">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-player" cellspacing="0" width="100%">
                        <tr>
                            <th>Name</th>
                            <th>{{ $player->name }}</th>
                        </tr>
                        <tr>
                            <th>Birth Date</th>
                            <th>{{ $player->birth_date }}</th>
                        </tr>
                        <tr>
                            <th>Nationality</th>
                            <th>{{ $player->nationality->name }}</th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-player" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Team</th>
                                <th>Season</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($salaries as $salary)
                            <tr data-entry-id="{{ $salary->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $salary->team->name }}</td>
                                <td>{{ $salary->season->season }}</td>
                                <td>{{ number_format($salary->salary) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Content Row -->

</div>
@endsection