@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2> Welcome back, <span class="text-muted">{{ $currentUser->name }}</span></h2>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                <div class="row mt-5">
                    <div class="col-md-3 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary"><h4 class="text-center">{{ __('My Currency') }}</h4>
                            </div>

                            <div class="card-body">
                                <h1 class="text-center"> {{ $currentUser->currency ?: 'none'  }} </h1>

                            </div>
                            <div class="card-footer bg-white">
                                <a href="#" data-toggle="modal" data-target="#changeCurrency"
                                   class="btn btn-primary shadow-sm">Change</a>
                            </div>
                        </div>
                    </div>

                    @include('modals.change-currency')

                    <div class="col-md-3 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-header bg-warning"><h4 class="text-center">{{ __('Watching') }}</h4></div>

                            <div class="card-body">
                                <h1 class="text-center"><small>({{ $currentUser->alert->amount }})</small> {{ $currentUser->alert->currency }}
                                    {{ $currentUser->alert->symbol }}
                                    1 {{ $currentUser->currency ?: 'none'  }} </h1>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="#" data-toggle="modal" data-target="#notification"
                                   class="btn btn-warning shadow-sm">Notify me</a>

                                {{--                                <a href="#" class="btn btn-warning float-right shadow-sm">Refresh</a>--}}
                            </div>
                        </div>
                    </div>
                    @include('modals.set-notification')

                    <div class="col-md-6">
                        @if($latestRates['success'])
                            <div class="table-responsive card shadow-sm">
                                <div class="card-header bg-success"><h4
                                            class="text-center">{{ __('Latest rates') }}</h4></div>
                                <table class="table table-striped card-body">
                                    @foreach($latestRates['rates'] as $symbol => $rate )
                                        <tr>
                                            <th> 1 {{ $currentUser->currency }}</th>
                                            <th>{{ $symbol }}  {{ $rate }}</th>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        @else
                            <div class="card">
                                <div class="card-header bg-danger"><h4 class="text-center">{{ __('API Error') }}</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="text-center">
                                        <i class="fa fa-exclamation-circle fa-2x text-danger"></i>
                                    </h1>
                                    <h5 class="text-danger text-center"> Please set your base currency to EUR to see the
                                        rates</h5>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
