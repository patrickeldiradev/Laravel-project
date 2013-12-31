@extends('admin.layouts.app')
@section('content')


    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="row">
                <h3 class="col-xs-8 panel__title"> <i class="fas fa-archive"></i>  <span>اضافة جديد</span> </h3>
                <div class="col-xs-4 panel-header panel__btn text-right">
                    <a href="{{ route('post.index', [App::getLocale()]) }}" class="uk-button uk-button-primary">  عرض جميع العلامات التجارية </a>
                </div>
            </div>
        </div>

        <div class="panel-body">

            <div class="language">
                <a href="{{ route('post.create', ['ar']) }}" class="btn btn-success"> Arabic </a>
                <a href="{{ route('post.create', ['en']) }}" class="btn btn-success"> English </a>
            </div>


            <form method="POST" action="{{ route('post.store', [App::getLocale()]) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="locale" value="{{App::getLocale()}}">
                <fieldset class="uk-fieldset">

                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text"> title  </label>
                        <input class="uk-input {{ $errors->has('title') ? ' uk-form-danger' : '' }}" type="text" name="title" placeholder="الاسم" value="{{ old('title') }}">
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text"> description  </label>
                        <textarea class="uk-textarea {{ $errors->has('description') ? ' uk-form-danger' : '' }}" rows="5" name="description" placeholder="description">{{ old('description') }}</textarea>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text"> image  </label>
                        <input  type="text"  class="uk-input {{ $errors->has('order') ? ' uk-form-danger' : '' }}" name="image">
                    </div>
                    
                    {{-- <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text"> الصورة  </label>
                        <br>
                        <span> - Preferred Diminsion is : 150 X 150 Pixel</span> <br>
                        <span> - Max Size : 2 MB </span>
                        <br>
                        <input  type="file" class="{{ $errors->has('image') ? ' uk-form-danger' : '' }}" name="image">
                    </div> --}}

                </fieldset>

                <div class="uk-margin">
                    <button  class="uk-button uk-button-primary uk-button-large"  name="button"> Save </button>
                </div>

            </form>


        </div>
    </div>


@endsection
