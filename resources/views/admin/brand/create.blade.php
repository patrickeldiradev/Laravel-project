@extends('admin.layouts.app')
@section('content')


    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="row">
                <h3 class="col-xs-8 panel__title"> <i class="fas fa-archive"></i>  <span>اضافة جديد</span> </h3>
                <div class="col-xs-4 panel-header panel__btn text-right">
                    <a href="{{ route('brand.index') }}" class="uk-button uk-button-primary">  عرض جميع العلامات التجارية </a>
                </div>
            </div>
        </div>

        <div class="panel-body">

            <form method="POST" action="{{ route('brand.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf

                <fieldset class="uk-fieldset">

                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text"> الاسم  </label>
                        <input class="uk-input {{ $errors->has('name') ? ' uk-form-danger' : '' }}" type="text" name="name" placeholder="الاسم" value="{{ old('name') }}">
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text"> الوصف  </label>
                        <textarea class="uk-textarea {{ $errors->has('description') ? ' uk-form-danger' : '' }}" rows="5" name="description" placeholder="الوصف">{{ old('description') }}</textarea>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text"> الترتيب  </label>
                        <input  type="number" min="1" value="1" class="uk-input {{ $errors->has('order') ? ' uk-form-danger' : '' }}" name="order">
                    </div>
                    
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text"> الصورة  </label>
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
