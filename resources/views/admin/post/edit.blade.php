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

            @include('admin.post._form', ['button' => 'Update'])

        </div>
    </div>


@endsection
