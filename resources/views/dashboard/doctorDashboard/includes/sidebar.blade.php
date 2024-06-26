<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow expanded" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item active">
                <a href="{{ route('dashboard.doctor') }}" class="la la-mouse-pointer"></i><span class="menu-title" data-i18n="nav.add_on_drag_drop.main">{{ trans('main-sidebar.index') }}</span></a>
            </li>
            
            
            <li class="nav-item">
                <a href=""><i class="la la-tags"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.invoice') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="{{ route('doctor.invoices') }}" data-i18n="nav.dash.ecommerce">{{ trans('invoice.invoice_list')}}</a>
                    </li>
                    <li class="">
                        <a class="menu-item" href="{{ route('doctor.invoices.complete') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.invoice_list_complete')}}</a>
                    </li>
                    <li class="">
                        <a class="menu-item" href="{{ route('doctor.invoices.review') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.invoice_list_review')}}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href=""><i class="la la-tags"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.services') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="{{ route('services.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.services')}}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href=""><i class="la la-anchor"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.bookLists') }}</span></span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="{{ route('reservations.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.Booked appointments') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href=""><i class="la la-tags"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.reviews') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="{{ route('reviews.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.reviews')}}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>