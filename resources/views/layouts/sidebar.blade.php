@php
    $company=DB::table('settings')->where('id',1)->first();
@endphp
  <div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header border-bottom">
            <img src="{{ asset('public/uploads/company/'.$company->company_logo) }}" height="38">
            <a href="{{ route('home') }}">{{ $company->company_name }}</a>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class='sidebar-title'>Main Menu</li>

                <li class="sidebar-item @if($page == 'dashboard') active @endif ">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="fa-solid fa-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item @if($page == 'pos') active @endif ">
                    <a href="{{ route('pos') }}" class='sidebar-link'>
                        <i class="fa-solid fa-money-check-dollar"></i>
                        <span><b>POS</b></span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub @if($page == 'order') active @endif">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Orders</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('pending.order') }}">Pending Orders</a>
                        </li>

                        <li>
                            <a href="{{ route('delivery.order') }}">All Delivery Orders</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub @if($page == 'sales') active @endif">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-chart-column"></i>
                        <span>Sales Report</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('today.sales') }}">Today Sales</a>
                        </li>
                        <li>
                            <a href="{{ route('month.sales') }}">Monthly Sales</a>
                        </li>
                        <li>
                            <a href="{{ route('year.sales') }}">This Year Sales</a>
                        </li>
                        <li>
                            <a href="{{ route('all.sales') }}">All Sales</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub @if($page == 'employee') active @endif">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-user-group"></i>
                        <span>Employees</span>
                    </a>
                    <ul class="submenu ">
                        <li>
                            <a href="{{ route('employee.add') }}">Add Employee</a>
                        </li>

                        <li>
                            <a href="{{ route('employee') }}">All Employee</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub @if($page == 'customer') active @endif">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-users-gear"></i>
                        <span>Customers</span>
                    </a>
                    <ul class="submenu ">
                        <li>
                            <a href="{{ route('customer.add') }}">Add Customer</a>
                        </li>

                        <li>
                            <a href="{{ route('customer') }}">All Customers</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub @if($page == 'supplier') active @endif">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-people-carry-box"></i>
                        <span>Suppliers</span>
                    </a>
                    <ul class="submenu ">
                        <li>
                            <a href="{{ route('supplier.add') }}">Add Supplier</a>
                        </li>

                        <li>
                            <a href="{{ route('supplier') }}">All Supplier</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub @if($page == 'advanceSalary') active @endif">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        <span>Advance Salary (EMP)</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('advance.add') }}">Add Advance Salary</a>
                        </li>

                        <li>
                            <a href="{{ route('advanceSalary') }}">All Advance Salary</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub @if($page == 'salary') active @endif">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-dollar"></i>
                        <span>Salary (EMP)</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('salary') }}">Pay Salary</a>
                        </li>

                        <li>
                            <a href="{{ route('allsalary') }}">All Salary</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub @if($page == 'category') active @endif">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-list"></i>
                        <span>Categories</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('category.add') }}">Add Category</a>
                        </li>

                        <li>
                            <a href="{{ route('category') }}">All Category</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub @if($page == 'product') active @endif">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-box-open"></i>
                        <span>Products</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('product.add') }}">Add Product</a>
                        </li>
                        <li>
                            <a href="{{ route('product') }}">All Product</a>
                        </li>
                        <li>
                            <a href="{{ route('import.product') }}">Import Product</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub @if($page == 'expense') active @endif">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-wallet"></i>
                        <span>Expenses</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('expense.add') }}">Add Expense</a>
                        </li>
                        <li>
                            <a href="{{ route('today') }}">Today Expense</a>
                        </li>
                        <li>
                            <a href="{{ route('month') }}">This Month Expense</a>
                        </li>
                        <li>
                            <a href="{{ route('year') }}">This Year Expense</a>
                        </li>

                        <li>
                            <a href="{{ route('expense.list') }}">All Expenses</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub @if($page == 'attendence') active @endif">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Attendence</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('takeAttendence') }}">Take Attendence</a>
                        </li>

                        <li>
                            <a href="{{ route('attendence') }}">All Attendence</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item @if($page == 'setting') active @endif ">
                    <a href="{{ route('setting') }}" class='sidebar-link'>
                        <i class="fa-solid fa-gear"></i>
                        <span>Setting</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i class="fa-solid fa-xmark"></i></i></button>
    </div>
</div>
