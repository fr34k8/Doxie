@inject('metrics', 'App\Services\MetricsService')

@extends('layouts.app')

@section('content')

    <div class="ks-column ks-page">
        <div class="ks-page-header">
            <section class="ks-title-and-subtitle">
                <div class="ks-title-block">
                    <h3 class="ks-main-title">{{ __('Dashboard') }}</h3>
                    <div class="ks-sub-title">
                        {{ __('Track your doxing stats') }}
                    </div>
                </div>
            </section>
        </div>

        <div class="ks-page-content">
            <div class="ks-page-content-body">
                <div class="ks-nav-body-wrapper">
                    <div class="container-fluid">

                        <div class="ks-widgets ks-rows-section">
                            <div class="row ks-amount-widgets-collection">
                                <div class="col-lg-4">
                                    <div class="ks-widget ks-widget-simple-solid-amount ks-primary">
                                        <span class="ks-amount">
                                            {{ $metrics->totalPeople() }}
                                        </span>
                                        <span class="ks-description">
                                            {{ __('Total scraped profiles') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="ks-widget ks-widget-simple-solid-amount ks-info">
                                        <span class="ks-amount">
                                            {{ $metrics->totalPages() }}
                                        </span>
                                        <span class="ks-description">
                                            {{ __('Total scraped pages') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="ks-widget ks-widget-simple-solid-amount ks-success">
                                        <span class="ks-amount">
                                            {{ $metrics->totalLinks() }}
                                        </span>
                                        <span class="ks-description">
                                            {{ __('Total scraped links') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card ks-card-widget ks-widget-payment-table-invoicing">
                                        <h5 class="card-header">
                                            {{ __('Latest Profiles') }}
    
                                            <div class="ks-controls">
                                                <a href="{{ route('people.index') }}" class="ks-control-link">
                                                    {{ __('All profiles') }}
                                                </a>
                                            </div>
                                        </h5>
                                        <div class="card-block">
                                            <table class="table ks-payment-table-invoicing">
                                                <tbody>
                                                    @forelse($people as $person)
                                                        @include('pages.people.tables.person')
                                                    @empty
                                                        <tr>
                                                            <td class="alert alert-info" colspan="4">
                                                                {{ __('You have not scraped any profiles') }}
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tr>
                                            </tbody></table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card ks-card-widget ks-widget-tasks-table">
                                        <h5 class="card-header">
                                            {{ __('Latest Pages') }}
    
                                            <div class="ks-controls">
                                                <a href="#" class="ks-control-link">
                                                    {{ __('View all pages') }}
                                                </a>
                                            </div>
                                        </h5>
                                        <div class="card-block">
                                            <table class="table ks-table-tasks">
                                                @forelse($pages as $page)
                                                    @include('pages.pages.tables.page')
                                                @empty
                                                    <tr>
                                                        <td class="alert alert-info" colspan="4">
                                                            {{ __('You have not scraped any profiles') }}
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ url('css/widgets/panels.min.css') }}">
@endpush