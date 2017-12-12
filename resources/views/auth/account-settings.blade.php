@extends('layouts.front-end')

@section('content')
    <div class="container mt-4">
        @include('flash::message')

        <div class="row">
            <div class="col-md-4"> {{-- Options --}}
                <div class="card card-shadow br-card">
                    <div class="card-header">
                        <i class="fa fa-fw fa-list"></i> Menu:
                    </div>
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#info" role="tab">
                            <i class="fa fa-fw fa-info-circle"></i> Account informatie
                        </a>

                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#security" role="tab">
                            <i class="fa fa-fw fa-key"></i> Account beveiliging
                        </a>
                    </div>
                </div>

                <div class="list-group list-group-flush mt-4 mb-4 card-shadow" style="border-radius: 5px;">
                    <a href="" class="list-group-item list-group-item-danger"> {{-- TODO: Implement route --}}
                        <i class="fa fa-fw fa-close"></i> Verwijder account.
                    </a>
                </div>
            </div> {{-- /Options --}}

            <div class="col-8"> {{-- Content --}}
                <div class="tab-content">
                    <div class="tab-pane fade @if(Request::is('admin/account/instellingen/informatie')) show active @endif" id="info" role="tabpanel">
                        @include('auth.settings.card-account-information')
                    </div>

                    <div class="tab-pane fade @if (Request::is('admin/account/instellingen/beveiliging')) show active @endif" id="security" role="tabpanel">
                        @include('auth.settings.card-account-security')
                    </div>
                </div>
            </div> {{-- /Content --}}
        </div>
    </div>
@endsection