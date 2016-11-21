@extends('layouts.master')

@section('content')

    <div id="login-modal" class="modal">
        <div class="modal-content">
          <h4>Enter Credentials</h4>

          <form class="col s12 m6" role="form" action="{{ url('/login') }}" method="POST">
              {{ csrf_field() }}

              <div class="row">
                  <div class="input-field col s12">
                      <input id="email" type="email" class="validate" required autofocus>
                      <label for="email">Email</label>
                  </div>
                  <div class="input-field col s12">
                      <input id="password" type="password" class="validate" required>
                      <label for="password">Password</label>
                  </div>
              </div>
              <div class="row">
                  <button class="btn waves-effect waves-light" type="submit" name="action">Login
                      <i class="material-icons right">send</i>
                  </button>
              </div>
          </form>
        </div>
    </div>

    <script type="text/javascript">
        @if(! Auth::check())
            $('#login-modal').openModal({dismissible:false});
        @endif
    </script>

@endsection
