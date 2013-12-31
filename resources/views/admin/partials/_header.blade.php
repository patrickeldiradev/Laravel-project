<header class="main-header fixed-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-11">

                <div class="user-area text-right">

                    <div class="container-fluid">
                        <div class="col-xs-12">

                            <div class="uk-inline">
                                <button class="uk-button user-option-btn" type="button"> <span>{{ auth()->user()->name }}</span> <i class="fas fa-angle-down"></i> </button>
                                <div style="display:none" uk-dropdown="mode: click">
                                    <ul class="uk-nav uk-dropdown-nav">
                                        <li class="uk-active"> <a class="" href="">  الملف الشخصي </a> </li>
                                        <li class="uk-nav-divider"></li>
                                        <li> <a class="" href="{{ route('admin.logout') }}"> تسجيل الخروج </a> </li>
                                    </ul>
                                </div>
                            </div>

                            
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</header>
