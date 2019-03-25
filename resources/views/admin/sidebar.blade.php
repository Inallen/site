<!-- Sidebar menu-->
{{ Widget::setRouteName(Request::route()->getName()) }}
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar"
             @if (Auth::user() && Auth::user()->avatar)
                src="{{ Auth::user()->avatar }}"
             @else
                src="{{ asset('images/avatar.png') }}"
             @endif
             alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
            <p class="app-sidebar__user-designation"> {{ Request::route()->getName() }}</p>
        </div>
    </div>
    <ul class="app-menu">
        @foreach (Widget::sideMenusItems() as $sideMenusItem)
            @if ($sideMenusItem->childMenus->count() > 0)
                <li class="treeview {{ $sideMenusItem->isActiveMenuItem() ? 'is-expanded' : '' }}">
                    <a class="app-menu__item {{ $sideMenusItem->isActiveMenuItem() ? 'active' : '' }}" href="{{ Route::has($sideMenusItem->menu_entry) ? route($sideMenusItem->menu_entry) : '#' }}" data-toggle="treeview">
                    <i class="app-menu__icon {{ $sideMenusItem->menu_icon }}"></i>
                    <span class="app-menu__label">{{ __($sideMenusItem->menu_title) }}</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        @foreach ($sideMenusItem->childMenus as $childMenusItem)
                            <li>
                                <a class="treeview-item {{ $childMenusItem->isActiveMenuItem() ? 'active' : '' }}" href="{{ Route::has($childMenusItem->menu_entry) ? route($childMenusItem->menu_entry) : '#' }}">
                                <i class="app-menu__icon {{ $childMenusItem->menu_icon }}"></i>
                                {{ __($childMenusItem->menu_title) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li>
                    <a class="app-menu__item {{ $sideMenusItem->isActiveMenuItem() ? 'active' : '' }}" href="{{ Route::has($sideMenusItem->menu_entry) ? route($sideMenusItem->menu_entry) : '#' }}">
                    <i class="app-menu__icon {{ $sideMenusItem->menu_icon }}"></i>
                    <span class="app-menu__label">{{ __($sideMenusItem->menu_title) }}</span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</aside>
