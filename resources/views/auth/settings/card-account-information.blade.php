<div class="card br-card card-shadow">
    <div class="card-header">
        <i class="fa fa-fw fa-info-circle"></i> Account informatie:
    </div>

    <div class="card-body">
        <form role="form" method="POST" action="{{ route('account.settings.info') }}">
            {{ csrf_field() }}
            {{ method_field('PATCH')  }}

            <div class="form-group row">
                <label class="col-4 col-form-label text-lg-right">Uw gebruikersnaam: <span class="text-danger">*</span></label>

                <div class="col-8">
                    <input type="text" placeholder="Uw gebruikersnaam" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') ?: $user->name }}" name="name">

                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label class="col-4 col-form-label text-lg-right">Uw e-emailadres: <span class="text-danger">*</span></label>

                <div class="col-8">
                    <input type="email" placeholder="Uw e-mailadres" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') ?: $user->email }}" name="email">

                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-8 offset-4">
                    <button type="submit" style="border-radius: 3px;" class="btn btn-sm btn-success">
                        <i class="fa fa-check"></i> Aanpassen
                    </button>

                    <button type="reset" style="border-radius: 3px;" class="btn btn-sm btn-danger">
                        <i class="fa fa-undo"></i> Annuleren
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>