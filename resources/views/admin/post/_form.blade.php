


<form method="POST" action="{{ $action }}" accept-charset="UTF-8" enctype="multipart/form-data">
    @csrf
    {!! $patch  !!}

    <input type="hidden" name="locale" value="{{App::getLocale()}}">
    <fieldset class="uk-fieldset">

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text"> title  </label>
            <input class="uk-input {{ $errors->has('title') ? ' uk-form-danger' : '' }}" type="text" name="title" placeholder="الاسم" value="{{ $title}}">
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text"> Slug  </label>
            <input class="uk-input {{ $errors->has('slug') ? ' uk-form-danger' : '' }}" type="text" name="slug" placeholder="slug" value="{{ $slug }}">
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text"> description  </label>
            <textarea class="uk-textarea {{ $errors->has('description') ? ' uk-form-danger' : '' }}" rows="5" name="description" placeholder="description">{{ $description }}</textarea>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">  الحالة   </label>
            <select id="status" class="uk-select {{ $errors->has('status') ? ' uk-form-danger' : '' }}"  name="status">
                <option value="1" {{ $status == 1 ? 'selected' : '' }} >متاح</option>
                <option value="2" {{ $status == 2 ? 'selected' : '' }}>غير متاح</option>
            </select>
        </div>
        
        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text"> الصورة  </label>
            <br>

            @if($post->getImage())
                <img src="{{ $post->getImage() }}" width="200" alt="">
            @endif

            <br>
            <br>
            <span> - Preferred Diminsion is : 150 X 150 Pixel</span> <br>
            <span> - Max Size : 2 MB </span>
            <input  type="file" class="{{ $errors->has('image') ? ' uk-form-danger' : '' }}" name="image">
        </div>

    </fieldset>

    <div class="uk-margin">
        <button  class="uk-button uk-button-primary uk-button-large"  name="button"> {{$button}} </button>
    </div>

</form>
