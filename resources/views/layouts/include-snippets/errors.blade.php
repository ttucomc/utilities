@if (count($errors) > 0)
    <div class="z-depth-3 card-panel grey darken-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: white;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
