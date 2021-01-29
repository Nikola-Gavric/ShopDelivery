
<div class="page-sidebar-wrapper">

    <div class="page-sidebar navbar-collapse collapse">

        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">

                <div class="sidebar-toggler"> </div>

            </li>
            <li class="sidebar-search-wrapper">



            </li>
            <br>
            <br>
            <li class="nav-item start @php echo "active",(request()->path() != 'admin/dashboard')?:"";@endphp">
                <a href="{{route('admin.dashboard')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start @php echo "active",(request()->path() != 'admin/department')?:"";@endphp">
                <a href="{{route('admin.department')}}" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">Office Departments</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee' ) active open @endif
            @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/add-employee' ) active open @endif
            @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/attendance' ) active open @endif
            @if( request()->path() == 'admin/employee' || request()->path() == 'admin/individual-attendance' ) active open @endif
            @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/attendance-count' ) active open @endif
            @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/edit-employee' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-user"></i>
                    <span class="title">Employee Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/employee' ) active open @endif">
                        <a href="{{route('employee.list')}}" class="nav-link ">
                            <span class="title">Employee List</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/employee/attendance' ) active open @endif">
                        <a href="{{route('employee.attend')}}" class="nav-link ">
                            <span class="title">Attendance</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/individual-attendance' ) active open @endif
                    @if( request()->path() == 'individual-attendance' ) active open @endif">
                        <a href="{{route('employee.individual')}}" class="nav-link">
                            <span class="title">Individual Attendance</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item start @php echo "active",(request()->path() != 'admin/payroll')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/payroll/chart')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/payroll/salary/sheet')?:"";@endphp">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Payroll Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/payroll' ) active open @endif">
                        <a href="{{route('payroll.index')}}" class="nav-link ">
                            <span class="title">Employee Salary</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/payroll/chart' ) active open @endif">
                        <a href="{{route('payroll.chart')}}" class="nav-link ">
                            <span class="title">Salary Chart</span>
                        </a>
                    </li>

                </ul>
            </li>

            @php
                $url = request()->path();
                $url = Find_fist_int($url);
            @endphp

            <li class="nav-item start @php echo "active",(request()->path() != 'admin/notice')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/notice/create')?:"";@endphp
            @php if (request()->path() == 'admin/notice/edit/{id}') echo "active" @endphp">
                <a href="{{route('notice.index')}}" class="nav-link nav-toggle">
                    <i class="fa fa-clipboard"></i>
                    <span class="title">Notice Management</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start @php echo "active",(request()->path() != 'admin/holidays')?:"";@endphp
            @php echo "active",(request()->path() != 'holidays')?:"";@endphp">
                <a href="{{route('holiday.index')}}" class="nav-link nav-toggle">
                    <i class="fa fa-toggle-off"></i>
                    <span class="title">Holiday Management</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item @if( request()->path() == 'admin/accounts' || request()->path() == 'admin/accounts' ) active open @endif
            @if( request()->path() == 'admin/accounts' || request()->path() == 'admin/accounts/transaction' ) active open @endif
            @if( request()->path() == 'admin/accounts' || request()->path() == 'admin/accounts/total-income' ) active open @endif
            @if( request()->path() == 'admin/accounts' || request()->path() == 'admin/account/income-expense' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-university"></i>
                    <span class="title">Accounts Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/account/income-expense' ) active open @endif">
                        <a href="{{route('income.expense')}}" class="nav-link ">
                            <span class="title">Income/Expense</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == 'admin/accounts/transaction' ) active open @endif">
                        <a href="{{route('trans.index')}}" class="nav-link ">
                            <span class="title">Transaction Purpose</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == 'admin/accounts' ) active open @endif">
                        <a href="{{route('account.index')}}" class="nav-link ">
                            <span class="title">Accounts Chart</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="heading">
                <h3 class="uppercase">Catering Management</h3>
            </li>

            <li class="nav-item start @php echo "active",(request()->path() != 'admin/office')?:"";@endphp">
                <a href="{{route('office.index')}}" class="nav-link nav-toggle">
                    <i class="fa fa-building-o" aria-hidden="true"></i>
                    <span class="title">Manage Catering Office</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start @php echo "active",(request()->path() != 'admin/food/mill')?:"";@endphp">
                <a href="{{route('food.mill.index')}}" class="nav-link nav-toggle">
                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                    <span class="title">Meal Package</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start @php echo "active",(request()->path() != 'admin/catering/system')?:"";@endphp">
                <a href="{{route('catering.index')}}" class="nav-link nav-toggle">
                    <i class="fa fa-taxi" aria-hidden="true"></i>
                    <span class="title">Meal Delivery</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start @php echo "active",(request()->path() != 'admin/account/catering')?:"";@endphp
            @php echo "active",(request()->path() != '')?:"";@endphp">
                <a href="{{route('catering.accounts.index')}}" class="nav-link nav-toggle">
                    <i class="fa fa-balance-scale"></i>
                    <span class="title">Catering Due History</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item start @php echo "active",(request()->path() != 'admin/general')?:"";@endphp">
                <a href="{{route('general.index')}}" class="nav-link nav-toggle">
                    <i class="fa fa-cog"></i>
                    <span class="title">General Management</span>
                    <span class="selected"></span>
                </a>
            </li>

        </ul>

    </div>
</div>
