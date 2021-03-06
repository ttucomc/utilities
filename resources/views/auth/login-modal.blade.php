{{-- Login modal --}}
<div id="login-modal" class="modal">
    <div class="modal-content">
      <h4>Enter Credentials</h4>

      <form class="col s12 m6" role="form" action="{{ url('/login') }}" method="POST">
          {{ csrf_field() }}

          @if($errors->has('email') || $errors->has('password'))
              <span style="color:red"><strong>Incorrect credentials</strong></span>
          @endif
          <div class="row" style="margin-top: 1em;">
              <div class="input-field col s12 {{ $errors->has('email') ? 'has-error' : '' }}">
                  <input id="email" name="email" type="email" class="validate" value="{{ old('email') }}" required autofocus>
                  <label for="email">Email</label>
              </div>
              <div class="input-field col s12 {{ $errors->has('password') ? 'has-error' : '' }}">
                  <input id="password" name="password" type="password" class="validate" value="{{ old('password') }}" required>
                  <label for="password">Password</label>
              </div>
          </div>
          <div class="row">
              <button class="btn waves-effect waves-light" type="submit" name="login">Login
                  <i class="material-icons right">send</i>
              </button>
          </div>
      </form>
    </div>
</div>
