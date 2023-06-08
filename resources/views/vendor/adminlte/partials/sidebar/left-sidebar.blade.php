<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links --}}
                @if(Auth::user()->type==1)
                    <li class="nav-item">
                        <a class="nav-link  {{ request()->route()->getName() === 'dashboard' || request()->route()->getName() === 'departments' ?'active' : '' }}"
                           href="{{route('departments')}}">
                            <i class="fas fa-home "></i>

                            <p>
                                Departments
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link  {{ request()->route()->getName() === 'employees' ?'active' : '' }}"
                           href="{{route('employees')}}">
                            <i class="fas fa-fw fa-users "></i>

                            <p>
                                employees
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link  {{ request()->route()->getName() === 'tasks' ?'active' : '' }}"
                           href="{{route('tasks')}}">
                            <i class="fas fa-fw fa-tasks "></i>

                            <p>
                                tasks
                            </p>
                        </a>
                    </li>
                @endif
                @if(Auth::user()->type==2)
                    <li class="nav-item">
                        <a class="nav-link  active"
                           href="{{route('tasks')}}">
                            <i class="fas fa-fw fa-tasks "></i>

                            <p>
                                tasks
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>

</aside>
