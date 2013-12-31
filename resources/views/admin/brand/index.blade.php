@extends('admin.layouts.app')

@section('content')


    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="row">
                <h3 class="col-xs-8 panel__title"> <i class="fas fa-archive"></i>  <span>العلامات التجارية</span> </h3>
                <div class="col-xs-4 panel-header panel__btn text-right">
                    <a href="{{ route('brand.create') }}" class="uk-button uk-button-primary"> اضافة جديد </a>
                </div>
            </div>
        </div>

        <div class="panel-body">

            @if( $brands->count() )
                <div class="uk-overflow-auto">
                    <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">

                        <thead>
                            <th scope="col">الترتيب</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">الصورة</th>
                            <th scope="col"></th>
                        </thead>
                        
                        @foreach($brands as $brand)

                            <tr>
                                <td>{{$brand->order}}</td>
                                <td>{{$brand->name}}</td>
                                <td><img class="uk-preserve-width uk-border-circle" src="{{ $brand->getImage() }}" width="40" alt=""></td>

                                <td width="120" class="text-right">
                                    <a href="{{ route('brand.edit', $brand->id ) }}" class="uk-button uk-button-primary uk-button-small" title="تعديل"> <i class="fas fa-edit"></i> </a>
                                    <!-- This is a button toggling the modal -->
                                    <button class="uk-button uk-button-danger uk-button-small" type="button" uk-toggle="target: #modal-confirm-delete-{{ $brand->id }}"><i class="fas fa-trash-alt"></i></button>
                                    <!-- This is the modal -->
                                    <div id="modal-confirm-delete-{{ $brand->id }}" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <button class="uk-modal-close-outside" type="button" uk-close></button>
                                            <h3 class="uk-modal-title"> هل متأكد من عملية الحذف ؟ </h3>
                                            <form method="POST" action="{{ route('brand.destroy', $brand->id ) }}" accept-charset="UTF-8" enctype="multipart/form-data">
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
                    {!! $brands->links() !!}
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
