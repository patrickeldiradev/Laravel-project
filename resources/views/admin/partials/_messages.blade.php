
@if( Session::has('success') )
    <div class="uk-alert-success" uk-alert>
      <a class="uk-alert-close" uk-close></a>
      {{ Session::get('success') }}
    </div>

@endif


@if (count($errors) > 0)
    <div class="uk-alert-danger" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
