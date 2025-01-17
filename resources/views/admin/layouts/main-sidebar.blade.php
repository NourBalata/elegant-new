<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li>
                    <a class="{{ (request()->is('admin/settings')) || (request()->is('admin/settings/*')) ? 'active' : '' }}" href="{{route('settings.index')}}"><span class="menu-side"><img src="{{asset('dashboard/assets/img/icons/menu-icon-16.svg')}}"
                                                                         alt=""></span> <span>Settings</span></a>
                </li>

                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{asset('dashboard/assets/img/icons/menu-icon-01.svg')}}" alt=""></span>
                        <span> Dashboard </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ (request()->is('admin/dashboard')) || (request()->is('admin')) ? 'active' : '' }}" href="{{route('admin.dashboard')}}">Dashboard</a></li>
{{--                        <li><a href="doctor-dashboard.html">Doctor Dashboard</a></li>--}}
{{--                        <li><a href="patient-dashboard.html">Patient Dashboard</a></li>--}}
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{asset('dashboard/assets/img/icons/menu-icon-02.svg')}}" alt=""></span>
                        <span> Doctors </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ (request()->is('admin/doctors')) ||  (request()->is('admin/doctors/*'))   ? 'active' : '' }}" href="{{route('doctors.index')}}">Doctor List</a></li>

                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{asset('dashboard/assets/img/icons/menu-icon-08.svg')}}" alt=""></span>
                        <span> Staff </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ (request()->is('admin/staff')) ||  (request()->is('admin/staff/*'))   ? 'active' : '' }}" href="{{route('staff.index')}}">Staff List</a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{asset('dashboard/assets/img/icons/menu-icon-03.svg')}}" alt=""></span>
                        <span>Patients </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ (request()->is('admin/patients')) ||  (request()->is('admin/patients/*'))   ? 'active' : '' }}" href="{{route('patients.index')}}">Patients List</a></li>

                    </ul>
                </li>


                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{asset('dashboard/assets/img/icons/menu-icon-08.svg')}}" alt=""></span>
                        <span> Suppliers </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ (request()->is('admin/suppliers')) ||  (request()->is('admin/suppliers/*'))   ? 'active' : '' }}" href="{{route('suppliers.index')}}">Suppliers List</a></li>

                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{asset('dashboard/assets/img/icons/menu-icon-13.svg')}}" alt=""></span>
                        <span> Categories</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a  class="{{ (request()->is('admin/categories')) ||  (request()->is('admin/categories/*'))   ? 'active' : '' }}" href="{{route('categories.index')}}">Categories</a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-shop"></i> <span> Brands</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ (request()->is('admin/brands')) ||  (request()->is('admin/brands/*'))   ? 'active' : '' }}" href="{{route('brands.index')}}">Brands</a></li>

                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-sass"></i> <span> Services</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ (request()->is('admin/services')) ||  (request()->is('admin/services/*'))   ? 'active' : '' }}" href="{{route('services.index')}}">Services</a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-pager"></i> <span> Products</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ (request()->is('admin/products')) ||  (request()->is('admin/products/*'))   ? 'active' : '' }}" href="{{route('products.index')}}">Products</a></li>

                    </ul>
                </li>



                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{asset('dashboard/assets/img/icons/menu-icon-15.svg')}}" alt=""></span>
                        <span> Sales Order </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ (request()->is('admin/sales_order')) ||  (request()->is('admin/sales_order/*'))   ? 'active' : '' }}" href="{{route('sales_order.index')}}">Sales Order List</a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{asset('dashboard/assets/img/icons/menu-icon-04.svg')}}" alt=""></span>
                        <span> Appointments </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="appointments.html">Appointment List</a></li>
                        <li><a href="add-appointment.html">Book Appointment</a></li>
                        <li><a href="edit-appointment.html">Edit Appointment</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{asset('dashboard/assets/img/icons/menu-icon-05.svg')}}" alt=""></span>
                        <span> Doctor Schedule </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="schedule.html">Schedule List</a></li>
                        <li><a href="add-schedule.html">Add Schedule</a></li>
                        <li><a href="edit-schedule.html">Edit Schedule</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{asset('dashboard/assets/img/icons/menu-icon-06.svg')}}" alt=""></span>
                        <span> Departments </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="departments.html">Department List</a></li>
                        <li><a href="add-department.html">Add Department</a></li>
                        <li><a href="edit-department.html">Edit Department</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="assets/img/icons/menu-icon-07.svg" alt=""></span>
                        <span> Accounts </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoices.html">Invoices</a></li>
                        <li><a href="payments.html">Payments</a></li>
                        <li><a href="expenses.html">Expenses</a></li>
                        <li><a href="taxes.html">Taxes</a></li>
                        <li><a href="provident-fund.html">Provident Fund</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="assets/img/icons/menu-icon-09.svg" alt=""></span>
                        <span> Payroll </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="salary.html"> Employee Salary </a></li>
                        <li><a href="salary-view.html"> Payslip </a></li>
                    </ul>
                </li>
                <li>
                    <a href="chat.html"><span class="menu-side"><img src="assets/img/icons/menu-icon-10.svg" alt=""></span>
                        <span>Chat</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="assets/img/icons/menu-icon-11.svg" alt=""></span>
                        <span> Calls</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="voice-call.html">Voice Call</a></li>
                        <li><a href="video-call.html">Video Call</a></li>
                        <li><a href="incoming-call.html">Incoming Call</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="assets/img/icons/menu-icon-12.svg" alt=""></span>
                        <span> Email</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="compose.html">Compose Mail</a></li>
                        <li><a href="inbox.html">Inbox</a></li>
                        <li><a href="mail-view.html">Mail View</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="assets/img/icons/menu-icon-13.svg" alt=""></span>
                        <span> Blog</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-details.html">Blog View</a></li>
                        <li><a href="add-blog.html">Add Blog</a></li>
                        <li><a href="edit-blog.html">Edit Blog</a></li>
                    </ul>
                </li>
                <li>
                    <a href="assets.html"><i class="fa fa-cube"></i> <span>Assets</span></a>
                </li>
                <li>
                    <a href="activities.html"><span class="menu-side"><img src="assets/img/icons/menu-icon-14.svg"
                                                                           alt=""></span>
                        <span>Activities</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-flag"></i> <span> Reports </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="expense-reports.html"> Expense Report </a></li>
                        <li><a href="invoice-reports.html"> Invoice Report </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="assets/img/icons/menu-icon-15.svg" alt=""></span>
                        <span> Invoice </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoices-list.html"> Invoices List </a></li>
                        <li><a href="invoices-grid.html"> Invoices Grid</a></li>
                        <li><a href="add-invoice.html"> Add Invoices</a></li>
                        <li><a href="edit-invoices.html"> Edit Invoices</a></li>
                        <li><a href="view-invoice.html"> Invoices Details</a></li>
                        <li><a href="invoices-settings.html"> Invoices Settings</a></li>
                    </ul>
                </li>
                <li>
                    <a href="settings.html"><span class="menu-side"><img src="assets/img/icons/menu-icon-16.svg"
                                                                         alt=""></span> <span>Settings</span></a>
                </li>
                <li class="menu-title">UI Elements</li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-laptop"></i> <span> Components</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="uikit.html">UI Kit</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="tabs.html">Tabs</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-edit"></i> <span> Forms</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="form-basic-inputs.html">Basic Inputs</a></li>
                        <li><a href="form-input-groups.html">Input Groups</a></li>
                        <li><a href="form-horizontal.html">Horizontal Form</a></li>
                        <li><a href="form-vertical.html">Vertical Form</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-table"></i> <span> Tables</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="tables-basic.html">Basic Tables</a></li>
                        <li><a href="tables-datatables.html">Data Table</a></li>
                    </ul>
                </li>
                <li>
                    <a href="calendar.html"><i class="fa fa-calendar"></i> <span>Calendar</span></a>
                </li>
                <li class="menu-title">Extras</li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-columns"></i> <span>Pages</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="login.html"> Login </a></li>
                        <li><a href="register.html"> Register </a></li>
                        <li><a href="forgot-password.html"> Forgot Password </a></li>
                        <li><a href="change-password2.html"> Change Password </a></li>
                        <li><a href="lock-screen.html"> Lock Screen </a></li>
                        <li><a href="profile.html"> Profile </a></li>
                        <li><a href="gallery.html"> Gallery </a></li>
                        <li><a href="error-404.html">404 Error </a></li>
                        <li><a href="error-500.html">500 Error </a></li>
                        <li><a href="blank-page.html"> Blank Page </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa fa-share-alt"></i> <span>Multi Level</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Level 1</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span> Level 2</span> <span
                                            class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><span>Level 1</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="logout-btn">
                <a href="login.html"><span class="menu-side"><img src="assets/img/icons/logout.svg" alt=""></span>
                    <span>Logout</span></a>
            </div>
        </div>
    </div>
</div>
