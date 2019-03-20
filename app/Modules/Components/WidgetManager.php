<?php

namespace App\Modules\Components;


use App\Menu;
use App\Utils\Traits\Singleton;

class WidgetManager
{
    use Singleton;

    protected $sideMenusItems;

    protected $routeName;
    /**
     *
     */
    protected function init()
    {
        $this->sideMenusItems = Menu::where('menu_parent', 0)->get();
    }

    public function getFooter()
    {
        return count($this->sideMenusItems);
    }

    public function sideMenusItems()
    {

        foreach ($this->sideMenusItems as $sideMenusItem) {
            if (!empty($this->routeName)) {
                if ($sideMenusItem->menu_entry == $this->routeName) {
                    $sideMenusItem->setMenuItemActive(true);
                    return $this->sideMenusItems;
                }
                if ($sideMenusItem->childMenus->count() > 0) {
                    foreach ($sideMenusItem->childMenus as $childMenusItem) {
                        if ($childMenusItem->menu_entry == $this->routeName) {
                            $childMenusItem->setMenuItemActive(true);
                            $sideMenusItem->setMenuItemActive(true);
                            return $this->sideMenusItems;
                        }
                    }
                }
            }
        }
        $this->sideMenusItems[0]->setMenuItemActive(true);
        return $this->sideMenusItems;
    }

    public function setRouteName($routeName) {
        $this->routeName = $routeName;
    }



}
