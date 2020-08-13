@extends('layouts.app')

@section('content')
<div class="container align-self-center">
    <h3>Fiche de présence</h3>
    <div class="input-group col-md-4">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Sélectionnez votre classe :</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01">
            <option selected>...</option>
            @foreach ($classrooms as $classroom)
                <option value="{{ $classroom->id }}">
                    {{ $classroom->id }}
                </option>
            @endforeach
        </select>
    </div>
    Please, click in the input below and use your card with the card reader.
    The code has a 10-length characters.
    A problem to authenticate ? Please contact your teacher or the secretariat.
    <div class="card mx-5 my-5 px-5 py-5">
        <h1>Validate.js example</h1>
        <form id="main" class="form-horizontal" action="/example" method="post" novalidate>
            <div class="form-group row mb-0">
                <div class="col-sm-8 md-form px-0">
                    <input id="email" class="form-control" type="email" name="email">
                    <label for="email" class="control-label">Email</label>
                </div>
                <div class="col-sm-4 messages"></div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-sm-8 md-form px-0">
                    <input id="password" class="form-control" type="password" name="password">
                    <label for="password" class="control-label">Pasword</label>
                </div>
                <div class="col-sm-4 messages"></div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-sm-8 md-form px-0">
                    <input id="confirm-password" class="form-control" type="password" name="confirm-password">
                    <label class="control-label" for="confirm-password">Confirm password</label>
                </div>
                <div class="col-sm-4 messages"></div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-sm-8 md-form px-0">
                    <input id="username" class="form-control" type="text" name="username">
                    <label class="control-label" for="username">Username</label>
                </div>
                <div class="col-sm-4 messages">
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-sm-8 md-form px-0">
                    <input id="birthdate" class="form-control" type="date" placeholder="YYYY-MM-DD" name="birthdate">
                    <label class="control-label" for="birthdate">Birthdate</label>
                </div>
                <div class="col-sm-4 messages"></div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-sm-8 px-0">
                    <select id="country" class="mdb-select md-form" name="country">
                        <option value="">Country</option>
                        <option value="BE">Belgium</option>
                        <option value="CA">Canada</option>
                        <option value="CN">China</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="EG">Egypt</option>
                        <option value="FR">France</option>
                        <option value="GR">Greece</option>
                        <option value="IN">India</option>
                        <option value="JP">Japan</option>
                        <option value="KE">Kenya</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="VE">Venezuela</option>
                    </select>
                </div>
                <div class="col-sm-4 messages"></div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-sm-8 md-form px-0">
                    <input id="zip" class="form-control" type="text"name="zip">
                    <label class="control-label" for="zip">ZIP Code</label>
                </div>
                <div class="col-sm-4 messages"></div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-sm-8 md-form px-0">
                    <input id="number-of-children" class="form-control" type="number" name="number-of-children">
                    <label class="control-label" for="number-of-children">Number of children</label>
                </div>
                <div class="col-sm-4 messages"></div>
            </div>
            <div class="form-group">
                <div class="text-center pt-3">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
