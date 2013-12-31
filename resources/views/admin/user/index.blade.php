@extends('admin.layouts.app')

@section('content')


    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="row">
                <h3 class="col-xs-8 panel__title"> <i class="fas fa-user-tie"></i> <span>المستخدمين</span> </h3>
                <div class="col-xs-4 panel-header panel__btn text-right">
                        <a href="{{ route('user.create') }}" class="uk-button uk-button-primary"> اضافة جديد </a>
                </div>
            </div>
        </div>

        <div class="panel-body">

            @if( $users->count() )
                <div class="uk-overflow-auto">
                    <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">

                        <thead>
                        <th class="text-center">#</th>
                        <th scope="col">الاسم</th>
                        <th scope="col">الدور</th>
                        <th scope="col">البريد الالكتروني</th>
                        <th scope="col"></th>
                        </thead>
                     
                        @foreach($users as $index => $user)

                                <tr>
                                    <td class="text-center"> {{ $index + $users->firstItem() }} </td>
                                    <td>{{$user->name}}</td>
                                    <td><span class="uk-label  {{ $user->isAdmin() ? 'uk-label-success' : 'uk-label-warning'}}">{{$user->role}}</span></td>
                                    <td>{{$user->email}}</td>

                                    <td width="120" class="text-right">

                                            <a href="{{ route('user.edit', $user->id )  }}" class="uk-button uk-button-primary uk-button-small" title="تعديل"> <i class="fas fa-edit"></i> </a>
                                            <!-- This is a button toggling the modal -->
                                            <button class="uk-button uk-button-danger uk-button-small" type="button" uk-toggle="target: #modal-confirm-delete-{{ $user->id }}"><i class="fas fa-trash-alt"></i></button>
                                            <!-- This is the modal -->
                                            <div id="modal-confirm-delete-{{ $user->id }}" uk-modal>
                                                <div class="uk-modal-dialog uk-modal-body">
                                                    <button class="uk-modal-close-outside" type="button" uk-close></button>
                                                    <h3 class="uk-modal-title"> هل متأكد من عملية الحذف ؟ </h3>
                                                    <form method="POST" action="{{ route('user.destroy', $user->id ) }}" accept-charset="UTF-8" enctype="multipart/form-data">
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
                    {!! $users->links() !!}
                </div>

            @else

                <div class="container-fluid text-center">
                    <h4> لا يوجد  </h4>
                </div>

            @endif

        </div>
    </div>


@endsection


@section('scripts')


@stop
