
<div class="card mb-3">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card-body">

      <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
        <p class="text-center small">Enter your username &amp; password to login</p>
      </div>

      <form class="row g-3 needs-validation" wire:submit.prevent="login">

        <div class="col-12">
          <label for="yourUsername" class="form-label">Username</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="text" wire:model="email" class="form-control" id="yourUsername" required="">
            <div class="invalid-feedback">Please enter your username.</div>
          </div>
        </div>

        <div class="col-12">
          <label for="yourPassword" class="form-label">Password</label>
          <input type="password" wire:model="password" class="form-control" id="yourPassword" required="">
          <div class="invalid-feedback">Please enter your password!</div>
        </div>

        <div class="col-12">
          <button class="btn btn-primary w-100" type="submit">Login</button>
        </div>
        <div class="col-12">
            {{ session('error') }}
            {{ session('message') }}
          <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
        </div>
      </form>

    </div>
  </div>
