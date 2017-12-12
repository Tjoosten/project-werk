<div class="card br-card card-shadow">
    <div class="card-header">
        <i class="fa fa-fw fa-key"></i> Account beveiliging:
    </div>
    <div class="card-body">
        <form role="form" method="POST" action="{{ route('account.settings.security') }}">
            {{ csrf_field() }}
            {{ method_field('PATCH')  }}

            <div class="form-group row">
                <label class="col-4 col-form-label text-lg-right">Nieuw wachtwoord: <span class="text-danger">*</span></label>

                <div class="col-8">
                    <input type="password" placeholder="Uw nieuw wachtwoord" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label class="col-4 col-form-label text-lg-right">Herhaal wachtwoord: <span class="text-danger">*</span></label>

                <div class="col-8">
                    <input type="password" placeholder="Herhaal uw nieuw wachtwoord" class="form-control{{ $errors->has('password_confirmation') }}" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
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