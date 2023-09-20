<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{url('admin2/dist/img/Laptop.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview  {{ ( request()->is('admin/generalSetting*') || request()->is('admin/Finance_calelander*') || request()->is('admin/brancheees*') || request()->is('admin/Shiftstypes*') || request()->is('admin/departements*')  || request()->is('admin/jobs_categories*') || request()->is('admin/Qualifications*') || request()->is('admin/occasions*') || request()->is('admin/Resignations*') || request()->is('admin/Nationalities*') || request()->is('admin/Religions*')) ? 'menu-open':'' }}">
                <a href="#" class="nav-link {{ ( request()->is('admin/generalSetting*') || request()->is('admin/Finance_calelander*') || request()->is('admin/brancheees**') || request()->is('admin/Shiftstypes') || request()->is('admin/departements*') || request()->is('admin/jobs_categories*')  || request()->is('admin/Qualifications*') ||request()->is('admin/occasions*') || request()->is('admin/Resignations*') || request()->is('admin/Nationalities*') || request()->is('admin/Religions*') ) ? 'active':'' }} ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                       قائمة الضبط
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin_panel_settings.index')}}" class="nav-link {{(request()->is('admin/generalSetting*'))?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>الضبط العام</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Finance_calelanders.index')}}" class="nav-link {{(request()->is('admin/Finance_calelander*'))?'active':'' }} ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>السنوات المالية</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('branches.index')}}" class="nav-link {{(request()->is('admin/brancheees*'))?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>الفروع</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Shiftstypes.index')}}" class="nav-link {{(request()->is('admin/Shiftstypes*'))?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>انواع الشفتات</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('departements.index')}}" class="nav-link {{(request()->is('admin/departements*'))?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ادارات الشركة</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('jobs_categories.index')}}" class="nav-link {{(request()->is('admin/jobs_categories*'))?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>فئات الوظائف</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Qualifications.index') }}" class="nav-link  {{ (request()->is('admin/Qualifications*'))?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>     مؤهلات الموظفين</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('occasions.index') }}" class="nav-link  {{ (request()->is('admin/occasions*'))?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>      المناسبات الرسمية</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Resignations.index') }}" class="nav-link  {{ (request()->is('admin/Resignations*'))?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>       أنواع ترك العمل</p>
                        </a>
                    </li>
                </ul>
                    <li class="nav-item has-treeview    {{ ( request()->is('admin/Employees*')) ? 'menu-open':'' }} ">
                        <a href="#" class="nav-link {{ ( request()->is('admin/Employees*')  ) ? 'active':'' }} ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                قائمة شئون الموظفين
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('Employees.index') }}" class="nav-link {{ (request()->is('admin/Employees*'))?'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> بيانات الموظفين</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin_panel_settings.index') }}" class="nav-link {{ (request()->is('admin/generalSettings*'))?'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> بيانات موظفين الادارة</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin_panel_settings.index') }}" class="nav-link {{ (request()->is('admin/generalSettings*'))?'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> انواع الاضافي للراتب</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin_panel_settings.index') }}" class="nav-link {{ (request()->is('admin/generalSettings*'))?'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> انواع الخصم للراتب</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin_panel_settings.index') }}" class="nav-link {{ (request()->is('admin/generalSettings*'))?'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> انواع البدلات للراتب</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin_panel_settings.index') }}" class="nav-link {{ (request()->is('admin/generalSettings*'))?'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>   هواتف الموظفين</p>
                                </a>
                            </li>
                        </ul>



        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
