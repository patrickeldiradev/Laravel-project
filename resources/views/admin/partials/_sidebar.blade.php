
<aside class="main-sidebar transition">
    <div class="aside-wrap">


        <div class="close-side">
            <i class="fas fa-times"></i>
        </div>


        <div class="sidebar-widget">

          <div class="sidebar-logo text-center">
                <a href="{{ url('/admin') }}" class="logo inline-block">
                    {{-- <img src="{{ asset('images/logo.png') }}" width="" class="img-responsive"> --}}
                </a>
          </div>

            <ul class="sidebar-list">

                <?php $currentRoute = \Request::route()->getName(); ?>
                <li>
                    <a href="{{ route('post.index') }}">
                        <i class="fas fa-edit"></i>
                       News
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="fas fa-users"></i>
                       Webinars
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="fas fa-users"></i>
                       Seminars
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="fas fa-users"></i>
                       Workshops
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="fas fa-users"></i>
                       E-Books
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="fas fa-users"></i>
                       Signals
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="fas fa-users"></i>
                       Videos
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="fas fa-users"></i>
                        Members
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="fas fa-users"></i>
                       User
                    </a>
                </li>

            </ul>

        </div>

    </div>
</aside>
