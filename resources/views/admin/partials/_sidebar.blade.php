
<aside class="main-sidebar transition">
    <div class="aside-wrap">


        <div class="close-side">
            <i class="fas fa-times"></i>
        </div>


        <div class="sidebar-widget">

          <div class="sidebar-logo text-center">
                <a href="{{ url('/admin') }}" class="logo inline-block">
                    <img src="{{ asset('images/logo.png') }}" width="" class="img-responsive">
                </a>
          </div>

            <ul class="sidebar-list">

                <?php $currentRoute = \Request::route()->getName(); ?>
                <li>
                    <a href="#">
                        <i class="fas fa-archive"></i>
                       News
                    </a>
                </li>
            </ul>

        </div>

    </div>
</aside>
