<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">@yield('contentheader')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">@yield('contentheaderactivelink')</li>
                        <li class="breadcrumb-item active">@yield('contentheaderactive')</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @if(\Illuminate\Support\Facades\Session::has('success'))
                    <div class="alert alert-danger text-right">
                        {{\Illuminate\Support\Facades\Session::get('success')}}
                    </div>
                @endif
             @yield('content')

            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
