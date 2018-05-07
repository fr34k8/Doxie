@extends('layouts.app')

@section('content')

    <div class="ks-column ks-page">
        <div class="ks-page-header">
            <section class="ks-title">
                <h3>{{ __('Api') }}</h3>
            </section>
        </div>

        <div class="ks-page-content">
            <div class="ks-page-content-body">
                <div class="ks-nav-body-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6" id="client-tokens" >
                                @include('pages.api.clients')
                            </div>
                            <div class="col-sm-6" id="personal-access-tokens">
                                @include('pages.api.personal-access-token')
                            </div>
                            <div class="col-sm-12" id="authorized-clients">
                                @include('pages.api.authorized-clients')
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
