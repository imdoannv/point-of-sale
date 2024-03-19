<nav class="side-nav">
    <a href="#" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone - HTML Admin Template" class="w-6" src="{{asset('admin/dist/images/logo.svg')}}">
        <span class="hidden xl:block text-white text-lg ml-3"> Shop of Noad </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>

        {{--Quản lý tài khoản--}}
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                <div class="side-menu__title">
                    Quản lý tài khoản
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('users.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Danh sách</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('users-deleted') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Thùng rác</div>
                    </a>
                </li>
            </ul>
        </li>

        {{--Quản lý nhân viên--}}

        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="hard-drive"></i> </div>
                <div class="side-menu__title">
                    Quản lý nhân viên
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('employees.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Danh sách</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('employees-deleted') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Thùng rác</div>
                    </a>
                </li>
            </ul>
        </li>


        {{--Quản lý khách hàng--}}

        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                <div class="side-menu__title">
                    Quản lý khách hàng
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('customers.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Danh sách</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('customers-deleted') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Thùng rác</div>
                    </a>
                </li>
            </ul>
        </li>

        {{--Quản lý danh mục--}}
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                <div class="side-menu__title">
                    Quản lý danh mục
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route('categories.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Danh sách</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('categories-deleted') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Thùng rác</div>
                    </a>
                </li>
            </ul>
        </li>


        {{--Quản lý đơn vị sản phẩm--}}
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                <div class="side-menu__title">
                    Quản lý đơn vị sản phẩm
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route('product-units.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Danh sách</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('product-units-deleted') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Thùng rác</div>
                    </a>
                </li>
            </ul>
        </li>


        {{--Quản lý kho--}}
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                <div class="side-menu__title">
                    Quản lý kho
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route('warehouses.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Danh sách</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('warehouses-deleted') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Thùng rác</div>
                    </a>
                </li>
            </ul>
        </li>

        {{--Quản lý sản phẩm--}}
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                <div class="side-menu__title">
                    Quản lý sản phẩm
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route('products.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Danh sách</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('products-deleted') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Thùng rác</div>
                    </a>
                </li>
            </ul>
        </li>

        {{--Quản lý tầng--}}
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                <div class="side-menu__title">
                    Quản lý tầng
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route('floors.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Danh sách</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('floors-deleted') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Thùng rác</div>
                    </a>
                </li>
            </ul>

        {{--Quản lý mã giảm giá--}}
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                <div class="side-menu__title">
                    Quản lý mã giảm giá
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route('discounts.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Danh sách</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('discounts-deleted') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">Thùng rác</div>
                    </a>
                </li>
            </ul>
        </li>


        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                <div class="side-menu__title">
                    E-Commerce
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Categories </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Add Product </div>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{asset('#')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                <div class="side-menu__title"> Quản lý đơn vị sản phẩm </div>
            </a>
        </li>
        <li>
            <a href="{{route('product-units.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="hard-drive"></i> </div>
                <div class="side-menu__title">Danh sách</div>
            </a>
        </li>
        <li>
            <a href="{{route('product-units-deleted') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="credit-card"></i> </div>
                <div class="side-menu__title">Thùng rác</div>
            </a>
        </li>
        <li>
            <a href="{{asset('#')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="message-square"></i> </div>
                <div class="side-menu__title"> Chat </div>
            </a>
        </li>
        <li>
            <a href="{{asset('#')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title"> Post </div>
            </a>
        </li>
        <li>
            <a href="{{asset('#')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
                <div class="side-menu__title"> Calendar </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="edit"></i> </div>
                <div class="side-menu__title">
                    Crud
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Data List </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Form </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="trello"></i> </div>
                <div class="side-menu__title">
                    Profile
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 1 </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 2 </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 3 </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="layout"></i> </div>
                <div class="side-menu__title">
                    Pages
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">
                            Wizards
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Layout 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Layout 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">
                            Blog
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Layout 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Layout 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">
                            Pricing
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Layout 2</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">
                            Invoice
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Layout 2</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">
                            FAQ
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Layout 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Layout 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Login </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Register </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Error Page </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Update profile </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Change Password </div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                <div class="side-menu__title">
                    Components
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">
                            Table
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Regular Table</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Tabulator</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">
                            Overlay
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Modal</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Slide Over</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Notification</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Tab </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Accordion </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Button </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Alert </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Progress Bar </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Tooltip </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Dropdown </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Typography </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Icon </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Loading Icon </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="sidebar"></i> </div>
                <div class="side-menu__title">
                    Forms
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Regular Form </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Datepicker </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Tom Select </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> File Upload </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">
                            Wysiwyg Editor
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Classic</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Inline</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Balloon</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Balloon Block</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('#')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Document</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Validation </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="hard-drive"></i> </div>
                <div class="side-menu__title">
                    Widgets
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Chart </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Slider </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('#')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Image Zoom </div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>

