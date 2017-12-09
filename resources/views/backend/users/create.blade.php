@extends('layouts.front-end')

@section('content')
    <div class="container my-4">
        {{ Breadcrumbs::render('users-create') }}

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-fw fa-user-plus"></i> Gebruiker toevoegen
                    </div>

                    <div class="card-body">
                        <form method="POST" id="create-user" action="{{ route('admin.users.store') }}">
                            {{ csrf_field() }} {{-- Form field protection --}}

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="alert alert-warning">
                                        <strong><i class="fa fa-warning"></i> Info:</strong>
                                        Het wachtwoord voor de gebruiker word automatisch aangemaakt en per mail verzonden naar de gebruiker.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label text-lg-right">Gebruikersnaam: <span class="text-danger">*</span></label>

                                <div class="col-lg-10">
                                    <input type="text"  placeholder="De gebruikersnaam" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label text-lg-right">E-mail adres: <span class="text-danger">*</span></label>

                                <div class="col-lg-10">
                                    <input type="text" placeholder="Het E-mail adres van de gebruiker" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label text-lg-right">Gebruikers permissie: <span class="text-danger">*</span></label>

                                <div class="col-lg-10">
                                    <select class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role">
                                        <option value="" selected disabled hidden>-- Selecteer de permissies voor de gebruiker --</option>

                                        @foreach ($roles as $role) {{-- Loop through the roles  --}}
                                            <option value="{{ $role->name }}" @if (old('role') == $role->name) selected @endif>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('role'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer">
                        <span class="pull-right">
                            <button type="submit" form="create-user" class="btn btn-sm btn-success">
                                <i class="fa fa-check"></i> Opslaan
                            </button>

                            <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-danger">
                                <i class="fa fa-undo"></i> Annuleren
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection