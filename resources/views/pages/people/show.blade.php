@extends('layouts.app')

@section('content')
    <div class="ks-column ks-page">
        
        <div class="ks-page-header">
            <section class="ks-title">
                <h3>{{ $person->name }}</h3>
            </section>
        </div>

        <div class="ks-page-content">
            <div class="ks-page-content-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card ks-crm-contact-user-column">
                                <div class="ks-crm-contact-user-column-main-info">
                                    <section>
                                        <img src="{{ $person->profilepicture }}" width="100" height="100" class="ks-crm-contact-user-avatar rounded-circle">
                                    </section>
                                    <section>
                                        <div class="ks-crm-contact-user-name">
                                            {{ $person->name }}
                                        </div>
                                        <div class="ks-crm-contact-user-location">
                                            {!! __('<b>Current City</b> :city', [
                                                'city' => e($person->location[0])
                                            ]) !!}
                                        </div>
                                    </section>
                                </div>
                                <div class="ks-crm-contact-user-column-custom-info">
                                    <h6 class="ks-custom-info-header">
                                        {{ __('More information') }}
                                    </h6>
                                    <div class="ks-custom-info-item">
                                        <div class="ks-custom-info-item-name">
                                            {{ __('Scraped from') }}
                                        </div>
                                        <div class="ks-custom-info-item-content">
                                            <a href="#">
                                                {{ $person->scraped->uri }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ks-custom-info-item">
                                        <div class="ks-custom-info-item-name">
                                            {{ __('Date Scraped') }}
                                        </div>
                                        <div class="ks-custom-info-item-content">
                                            {{ $person->scraped->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                                <div class="ks-crm-contact-user-column-custom-info">
                                    <h6 class="ks-custom-info-header">
                                        {{ __('Pages') }}
                                    </h6>
                                    <div class="ks-custom-info-item">
                                        @foreach($person->pages as $page)
                                            <span class="badge badge-default-outline">
                                                {{ $page->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            <div class="ks-crm-contact-user-tabs-column">
                                <div class="ks-tabs-container ks-tabs-default ks-tabs-no-separator">
                                    <ul class="nav ks-nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#" data-toggle="tab" data-target="#education" aria-expanded="true">
                                                {{ __('Education') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="tab" data-target="#work" aria-expanded="false">
                                                {{ __('Work') }}
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="education" role="tabpanel" aria-expanded="true" data-height="735" style="height: 775px;">
                                            <ul class="list-group">                                                
                                                @forelse($person->education as $education)
                                                    <li class="list-group-item">
                                                        {{ $education }}
                                                    </li>
                                                @empty
                                                    <div class="alert alert-info">
                                                        {{ __('This person has no education available') }}
                                                    </div>
                                                @endforelse
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="crm-tab-events" role="tabpanel" aria-expanded="false" data-height="735" style="height: 775px;">
                                            <ul class="list-group">                                                
                                                @forelse($person->work as $work)
                                                    <li class="list-group-item">
                                                        {{ $work }}
                                                    </li>
                                                @empty
                                                    <div class="alert alert-info">
                                                        {{ __('This person has no work available') }}
                                                    </div>
                                                @endforelse
                                            </ul>                                        
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
    <link rel="stylesheet" type="text/css" href="{{ url('css/pages/contact.min.css') }}"> 
@endpush