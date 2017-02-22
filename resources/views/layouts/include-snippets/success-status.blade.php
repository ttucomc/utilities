@if (session('status'))
    <div id="success-status" class="z-depth-3 card-panel green darken-3">
        <span style="color: white;">{{ session('status') }}</span>
    </div>
@endif
