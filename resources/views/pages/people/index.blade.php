@extends('layouts.app') @section('content')

<div class="ks-column ks-page">

    <div class="ks-page-header">
        <section class="ks-title">
            <h3>{{ __('Scraped Profiles') }}</h3>
        </section>
    </div>

    <div class="ks-page-content">
        <div class="ks-page-content-body ks-content-nav ks-user-list-view">
            <div class="ks-nav ks-browse">
                <div class="ks-separator">
                    {{ __('Website') }}
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <div class="nav-link">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <label class="custom-control-label">
                                    {{ __('Facebook') }}
                                </label>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <label class="custom-control-label">
                                    {{ __('Twitter') }}
                                </label>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="ks-nav-body">
                <div class="ks-user-list-view-header-block">
                    <h4 class="ks-user-list-view-header-block-name">
                        {{ __('Profiles') }}
                        <span class="ks-user-list-view-header-block-amount">
                            <span class="ks-icon la la-users"></span>
                            <span>
                                {{ __(':count profiles', ['count' => 0]) }}
                            </span>
                        </span>
                    </h4>
                </div>

                <div class="ks-user-list-view-table">
                    <div class="ks-user-list-view-table">
                        <div class="ks-full-table">
                            <table id="ks-datatable" class="table ks-table-info dt-responsive nowrap" width="100%" data-pagination="true">
                                <thead>
                                    <tr>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Location') }}</th>
                                        <th>{{ __('Work') }}</th>
                                        <th>{{ __('Education') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($people as $person)
                                        <tr>
                                            <td>
                                                <img src="{{ $person->profilepicture }}" class="ks-avatar" alt="" width="36" height="36"> 
                                                <a href="{{ route('people.show', $person->id) }}">
                                                    {{ $person->name }}
                                                </a>
                                            </td>
                                            <td>
                                                @forelse($person->location as $location)
                                                    <span class="badge badge-info-outline ks-sm">
                                                        {{ $location }}
                                                    </span><br>
                                                @empty
                                                    <div class="badge badge-info-outline ks-sm">
                                                        {{ __('No information to show') }}
                                                    </div>
                                                @endforelse
                                            </td>
                                            <td>
                                                @forelse($person->work as $work)
                                                    <span class="badge badge-info-outline ks-sm">
                                                        {{ $work }}
                                                    </span><br>
                                                @empty
                                                    <div class="badge badge-info-outline ks-sm">
                                                        {{ __('No information to show') }}
                                                    </div>
                                                @endforelse
                                            </td>
                                            <td>
                                                @forelse($person->education as $education)
                                                    <span class="badge badge-info-outline ks-sm">
                                                        {{ $education }}
                                                    </span> <br>
                                                @empty
                                                    <div class="badge badge-info-outline ks-sm">
                                                        {{ __('No information to show') }}
                                                    </div>
                                                @endforelse
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="alert alert-info" colspan="4">
                                                {{ __('You have not scraped any profiles') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $people->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection 

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ url('css/pages/users-list.min.css') }}"> 
@endpush