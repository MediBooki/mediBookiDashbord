<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow expanded" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item active">
                <a href="{{ route('dashboard.doctor') }}" class="la la-mouse-pointer"></i><span class="menu-title" data-i18n="nav.add_on_drag_drop.main">{{ trans('main-sidebar.index') }}</span></a>
            </li>
            
            
                <li class="nav-item">
                    <a href=""><i class="la la-cube"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.sections') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('sections.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                        </li>
                    </ul>
                </li>
            
            
            <li class="nav-item">
                <a href=""><i class="la la-bookmark-o"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.doctors') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="{{ route('doctors.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                    </li>
                </ul>
            </li>
            
            
                <li class="nav-item">
                    <a href=""><i class="la la-beer"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.services') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('services.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.single_service')}}</a>
                        </li>
                        <li class="">
                            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.group_service')}}</a>
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
                <li class="nav-item">
                    <a href=""><i class="la la-edit"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.patient') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('patients.index') }}" data-i18n="nav.dash.ecommerce">{{ trans('patient.patient_list')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('size.Add_Size') }}</a>
                        </li>
                    </ul>
                </li>
            
            
                <li class="nav-item">
                    <a href=""><i class="la la-tags"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('main-sidebar.invoice') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('doctor.invoices') }}" data-i18n="nav.dash.ecommerce">{{ trans('invoice.invoice_list')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('tag.Add_Tag') }}</a>
                        </li>
                    </ul>
                </li>
            
            
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
            
            
                <li class="nav-item">
                    <a href=""><i class="la la-cubes"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('product.Products') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('product.Add_Product') }}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('product.Bulk_product_upload') }}</a>
                        </li>
                    </ul>
                </li>
            
            
            <li class="nav-item">
                <a href=""><i class="la la-building-o"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('company.companies') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('company.Add_company') }}</a>
                    </li>
                </ul>
            </li>
            
            
                <li class="nav-item">
                    <a href=""><i class="la la-cubes"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('AffiliateProduct.Products') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('product.Add_Product') }}</a>
                        </li>
                    </ul>
                </li>
            
            
            <li class="nav-item">
                <a href=""><i class="la la-life-ring"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('coupon.coupons') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('coupon.Add_coupon') }}</a>
                    </li>
                </ul>
            </li>
            
            
            <li class="nav-item">
                <a href=""><i class="la la-pie-chart"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('order.orders') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                    </li>
                    <li class="">
                        <a class="menu-item" href="#ta-i18n="nav.dash.ecommerce">{{ trans('order.delivered')}}</a>
                    </li>
                    <li class="">
                        <a class="menu-item" href="#ta-i18n="nav.dash.ecommerce">{{ trans('order.undelivered')}}</a>
                    </li>
                    <li class="">
                        <a class="menu-item" href="#ta-i18n="nav.dash.ecommerce">{{ trans('order.preparation')}}</a>
                    </li>
                </ul>
            </li>
            
            
            <li class="nav-item">
                <a href=""><i class="la la-users"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('user.users') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('user.Add_user') }}</a>
                    </li>
                </ul>
            </li>
            
            
                <li class="nav-item">
                    <a href=""><i class="la la-user-secret"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('partner.Partners') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                        </li>
                        
                            <li>
                                <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('history.histories')}}</a>
                            </li>
                            <li>
                                <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('history.Add_history')}}</a>
                            </li>
                        
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('partner.Add_Partner') }}</a>
                        </li>
                    </ul>
                </li>
            
            
                <li class="nav-item">
                    <a href=""><i class="la la-exclamation-triangle"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('policy.Policies') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('policy.Add_Policy') }}</a>
                        </li>
                    </ul>
                </li>
            
                <li class="nav-item">
                    <a href=""><i class="la la-eyedropper"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('FAQcategory.FAQ_cs') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('FAQcategory.Add_FAQ_c') }}</a>
                        </li>
                    </ul>
                </li>
            
            
                <li class="nav-item">
                    <a href=""><i class="la la-eyedropper"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('FAQ.FAQs') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('FAQ.Add_FAQ') }}</a>
                        </li>
                    </ul>
                </li>
            
                <li class="nav-item">
                    <a href=""><i class="la-suitcase"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('GYMLayout.GYMLayouts') }}</span></a>
                    <ul class="menu-content">
                        
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('GYMLayout.Add_GYMLayout') }}</a>
                        </li>
                        <li class="">
                            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('GYMProject.GYMProjects')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('GYMProject.Add_GYMProject') }}</a>
                        </li>
                        <li class="">
                            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('Gym3D_virtual.Gym3D_virtuals')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('Gym3D_virtual.Add_Gym3D_virtual') }}</a>
                        </li>
                        <li class="">
                            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('Gym2D.Gym2Ds')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('Gym2D.Add_Gym2D') }}</a>
                        </li>
                        <li class="">
                            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('Gym3D.Gym3Ds')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('Gym3D.Add_Gym3D') }}</a>
                        </li>
                    </ul>
                </li>
            
                <li class="nav-item">
                    <a href=""><i class="la la-file-text-o"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('Blogcategory.Blog_cs') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('Blogcategory.Add_Blog_c') }}</a>
                        </li>
                    </ul>
                </li>
            
            
                <li class="nav-item">
                    <a href=""><i class="la la-file-text-o"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('Blog.Blogs') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('Blog.Add_Blog') }}</a>
                        </li>
                    </ul>
                </li>
            
            <li class="nav-item">
                <a href=""><i class="la la-file-text-o"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('SellUS.SellUS') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('SellUS.Add_SellUS') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href=""><i class="la la-file-text-o"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('currency.currency') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('currency.Add_currency') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href=""><i class="la la-file-text-o"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('seller.vendor') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href=""><i class="la la-file-text-o"></i><span class="menu-title" data-i18n="nav.dash.main">Email Setting</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="#test') }}" data-i18n="nav.dash.ecommerce">update Email Setting</a>
                    </li>
                </ul>
            </li>
            
                <li class="nav-item">
                    <a href=""><i class="la la-rouble"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('About.Abouts') }}</span></a>
                    <ul class="menu-content">
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('About.update_About') }}</a>
                        </li>
                    </ul>
                </li>
            
            
                <li class="nav-item">
                    <a href=""><i class="la la-gears"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('admin.Admins') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('admin.Add_Admin') }}</a>
                        </li>
                    </ul>
                </li>
            
            
                <li class="nav-item">
                    <a href=""><i class="la la-key"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('role.roles') }}</span></a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('role.Add_role') }}</a>
                        </li>
                    </ul>
                </li>
            
            
            <li class="nav-item">
                <a href=""><i class="la la-gear"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('setting.settings') }}</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="#" data-i18n="nav.dash.crypto">{{ trans('setting.settings_update') }}</a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item">
                <a href=""><i class="la la-photo"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('banner.banners') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('banner.Add_banner') }}</a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item">
                <a href=""><i class="la la-photo"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('banner.GymBanners') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('banner.Add_banner') }}</a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item">
                <a href=""><i class="la la-soccer-ball-o"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('aftersale.aftersales') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                    </li>
                    
                </ul>
            </li>
            <li class="nav-item">
                <a href=""><i class="la la-sign-in"></i><span class="menu-title" data-i18n="nav.dash.main">Clear Cache</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                    </li>
                    
                </ul>
            </li>
            <li class="nav-item">
                <a href=""><i class="la la-sign-in"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('joinus.joinus') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                    </li>
                    
                </ul>
            </li>
            <li class="nav-item">
                <a href=""><i class="la la-tasks"></i><span class="menu-title" data-i18n="nav.dash.main">{{ trans('quotation.quotations') }}</span></a>
                <ul class="menu-content">
                    <li class="">
                        <a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">{{ trans('main-sidebar.view All')}}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>