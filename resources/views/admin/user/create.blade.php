@extends('admin.layouts.app')
@section('content')


    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="row">
                <h3 class="col-xs-8 panel__title"> <i class="fas fa-user-tie"></i>  <span>اضافة جديد</span> </h3>
                <div class="col-xs-4 panel-header panel__btn text-right">
                    <a href="{{ route('user.index') }}" class="uk-button uk-button-primary">  عرض جميع المستخدمين </a>
                </div>
            </div>
        </div>

        <div class="panel-body">

            <form method="POST" action="{{ route('user.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf

                <fieldset class="uk-fieldset">


                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text"> الاسم  </label>
                        <input class="uk-input {{ $errors->has('name') ? ' uk-form-danger' : '' }}" type="text" name="name" placeholder="الاسم" value="{{ old('name') }}">
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text"> البريد الالكتروني  </label>
                        <input class="uk-input {{ $errors->has('email') ? ' uk-form-danger' : '' }}" type="text" name="email" placeholder="البريد الالكتروني" value="{{ old('email') }}">
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text"> {{ __('Password') }}  </label>
                        <input id="password" type="password" class="uk-textarea {{ $errors->has('password') ? ' is-invalid' : '' }}"  name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text"> {{ __('Confirm Password') }}  </label>
                        <input id="password-confirm" type="password" class="uk-textarea"  name="password_confirmation" required>
                    </div>




                </fieldset>

                <div class="uk-margin">
                    <button  class="uk-button uk-button-primary uk-button-large"  name="button"> حفظ </button>
                </div>

            </form>


        </div>
    </div>


@endsection
