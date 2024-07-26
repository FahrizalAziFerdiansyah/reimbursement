<form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('login.authenticate') }}">
    @csrf
    <div class="col-12">
        <label for="nip" class="form-label">NIP</label>
        <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">NIP</span>
            <input type="text" name="nip" class="form-control" id="nip" required>
            <div class="invalid-feedback">Please enter your username.</div>
        </div>
    </div>

    <div class="col-12">
        <label for="yourPassword" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="yourPassword" required>
        <div class="invalid-feedback">Please enter your password!</div>
    </div>
    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-success w-100" type="submit">Login</button>
    </div>
</form>
