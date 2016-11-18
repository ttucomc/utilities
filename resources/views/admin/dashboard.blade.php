@extends('layouts.master')

@section('content')

    <div id="login-modal" class="modal">
        <div class="modal-content">
          <h4>Enter Credentials</h4>

          <form class="col s12" role="form" action="#" method="POST">
              <div class="row">
                  <div class="input-field col s12 m6">
                      <input placeholder="Enter username" id="username" type="text" class="validate">
                  </div>
              </div>
              <div class="row">
                  <div class="input-field col s12 m6">
                      <input placeholder="Enter password" id="password" type="text" class="validate">
                  </div>
              </div>
          </form>

          </div>
        </div>
    </div>

@endsection
