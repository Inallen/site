<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_title',
        'menu_slug',
        'menu_entry',
    ];

    protected $table = 'menus';

    protected $is_active_menu_item = false;


    public function childMenus()
    {
        return $this->hasMany('App\Menu', 'menu_parent');
    }

    public function parentMenu()
    {
        return $this->belongsTo('App\Menu', 'menu_parent');
    }

    /**
     * @return bool
     */
    public function isActiveMenuItem()
    {
        return $this->is_active_menu_item;
    }

    /**
     * @param $is_active_menu_item
     */
    public function setMenuItemActive($is_active_menu_item)
    {
        $this->is_active_menu_item = $is_active_menu_item;
    }

}
