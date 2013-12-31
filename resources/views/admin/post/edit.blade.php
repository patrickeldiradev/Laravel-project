@extends('admin.layouts.app')
@section('content')


    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="row">
                <h3 class="col-xs-8 panel__title"> <i class="fas fa-archive"></i>  <span>تعديل</span> </h3>
                <div class="col-xs-4 panel-header panel__btn text-right">
                    <a href="{{ route('post.index') }}" class="uk-button uk-button-primary">  عرض جميع العلامات التجارية </a>
                </div>
            </div>
        </div>

        <div class="panel-body">


            <div class="language">
                <a href="{{ route('post.edit', ['ar', $post->id]) }}" class="btn btn-success"> Arabic </a>
                <a href="{{ route('post.edit', ['en', $post->id]) }}" class="btn btn-success"> English </a>
            </div>


            <form method="POST" action="{{ route('post.update' , $post->id ) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <fieldset class="uk-fieldset">


                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text"> title  </label>
                        <input class="uk-input {{ $errors->has('title') ? ' uk-form-danger' : '' }}" type="text" name="title" placeholder="title" value="{{ $post->lang->title }}">
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text"> description  </label>
                        <textarea class="uk-textarea {{ $errors->has('description') ? ' uk-form-danger' : '' }}" rows="5" name="description" placeholder="description">{{ $post->lang->description }}</textarea>
                    </div>


                    
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text"> الصورة  </label>
                        <br>

                        <br>
                        <span> - Preferred Diminsion is : 150 X 150 Pixel</span> <br>
                        <span> - Max Size : 2 MB </span>
                        <br>
                        <input  type="file" class="{{ $errors->has('image') ? ' uk-form-danger' : '' }}" name="image">
                    </div>

                </fieldset>

                <div class="uk-margin">
                    <button  class="uk-button uk-button-primary uk-button-large"  name="button"> حفظ </button>
                </div>

            </form>


        </div>
    </div>


@endsection
