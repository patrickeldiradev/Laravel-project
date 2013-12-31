@extends('admin.layouts.app')

@section('content')


    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="row">
                <h3 class="col-xs-8 panel__title"> <i class="fas fa-archive"></i>  <span> Posts  </span> </h3>
                <div class="col-xs-4 panel-header panel__btn text-right">
                    <a href="{{ route('post.create') }}" class="uk-button uk-button-primary"> @lang('admin.addnew') </a>
                </div>
            </div>
        </div>

        <div class="panel-body">


            <div class="language">
                <a href="http://127.0.0.1:8000/lang/ar" class="btn btn-success"> Arabic </a>
                <a href="http://127.0.0.1:8000/lang/en" class="btn btn-success"> English </a>
            </div>
            
            @if( $posts->count() )
                <div class="uk-overflow-auto">
                    <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">

                        <thead>
                            <th scope="col">الترتيب</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">الصورة</th>
                            <th scope="col"></th>
                        </thead>
                        
                        @foreach($posts as $post)

                            <tr>
                                <td>{{$post->image}}</td>
                                <td>{{$post->lang->title}}</td>

                                <td width="120" class="text-right">
                                    <a href="{{ route('post.edit', $post->id ) }}" class="uk-button uk-button-primary uk-button-small" title="تعديل"> <i class="fas fa-edit"></i> </a>
                                    <!-- This is a button toggling the modal -->
                                    <button class="uk-button uk-button-danger uk-button-small" type="button" uk-toggle="target: #modal-confirm-delete-{{ $post->id }}"><i class="fas fa-trash-alt"></i></button>
                                    <!-- This is the modal -->
                                    <div id="modal-confirm-delete-{{ $post->id }}" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <button class="uk-modal-close-outside" type="button" uk-close></button>
                                            <h3 class="uk-modal-title"> هل متأكد من عملية الحذف ؟ </h3>
                                            <form method="POST" action="{{ route('post.destroy', $post->id ) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                                                @method('DELETE')
                                                @csrf
                                                <p class="uk-text-right">
                                                    <button class="uk-modal-close uk-button uk-button-primary" type="button">تراجع</button>
                                                    <button type="submit" class="uk-button uk-button-danger" value="Delete"> تأكيد الحذف </button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @endforeach

                            </tbody>

                    </table>
                </div>
                <div class="pagination-wap">
                    {!! $posts->links() !!}
                </div>

            @else

                <div class="container-fluid text-center">
                    <h4> No data  </h4>
                </div>

            @endif

        </div>
    </div>


@endsection


@section('scripts')


@stop
