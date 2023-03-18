<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow expanded" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item active">
                <a href="{{ route('dashboard') }}" class="la la-mouse-pointer"></i><span class="menu-title" data-i18n="nav.add_on_drag_drop.main">{{ trans('main-sidebar.index') }}</span></a>
            </li>
            
            @can('sections')
                <li class="nav-item">
                    <a href=""><i class="la la-cube"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.sections') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('sections.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('doctors')
            <li class="nav-item">
                <a href=""><i class="la la-bookmark-o"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.doctors') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="{{ route('doctors.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                    </li>
                </ul>
            </li>
            @endcan
                @can('services')
                <li class="nav-item">
                    <a href=""><i class="la la-beer"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.services') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('services.doctors') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.services')}}</a>
                        </li>
                        <li class="">
                            <a class="menu-item" href="{{ route('insurances.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.insurance')}}</a>
                        </li>
                        <li class="">
                            <a class="menu-item" href="{{ route('ambulances.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.ambulance')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('main-sidebar.ambulance_calls') }}</a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('patients')
                <li class="nav-item">
                    <a href=""><i class="la la-edit"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.patient') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('patients.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('patient.patient_list')}}</a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('invoices')
                <li class="nav-item">
                    <a href=""><i class="la la-tags"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.invoice') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('invoices.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('invoice.invoice_list')}}</a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('accounts')
                <li class="nav-item">
                    <a href=""><i class="la la-anchor"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.account') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('receipts.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.receipt')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="{{ route('payments.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.payment')}}</a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('x-ray')
                <li class="nav-item">
                    <a href=""><i class="la la-anchor"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.x-ray') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('rayInfo.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.dignosis_x-ray') }}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="{{ route('rayInfo.complete') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.dignosis_complate_x-ray') }}</a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('laboratory')
                <li class="nav-item">
                    <a href=""><i class="la la-anchor"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.laboratory') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('labInfo.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.diagnosis_laboratory') }}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="{{ route('labInfo.complete') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.diagnosis_complete_laboratory') }}</a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('medicine')
                <li class="nav-item">
                    <a href=""><i class="la la-edit"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.medicines') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('medicines.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('bookLists')
                <li class="nav-item">
                    <a href=""><i class="la la-anchor"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.bookLists') }}</span></span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('bookLists.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.wait_bookLists') }}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="{{ route('bookLists.create') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.complete_bookLists') }}</a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('users')
                <li class="nav-item">
                    <a href=""><i class="la la-anchor"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.users') }}</span></span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('users.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.users') }}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="{{ route('roles.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.roles') }}</a>
                        </li>
                    </ul>
                </li>
                @endcan
                <li class="nav-item">
                    <a href=""><i class="la la-anchor"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.orders') }}</span></span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('Dash_orders.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.orders') }}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="{{ route('preparation') }}" data-i18n="nav.dash.ecommerce">{{ trans('order.preparation') }}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="{{ route('delivered') }}" data-i18n="nav.dash.ecommerce">{{ trans('order.delivered') }}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="{{ route('undelivered') }}" data-i18n="nav.dash.ecommerce">{{ trans('order.undelivered') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href=""><i class="la la-anchor"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.settings') }}</span></span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('settings.edit',1) }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.settings') }}</a>
                        </li>
                        <li class="">
                            <a class="menu-item" href="{{ route('sliders.create') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.sliders') }}</a>
                        </li>
                    </ul>
                </li>
        </ul>
    </div>
</div>