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
        'menu_title', 'menu_slug', 'menu_entry',
    ];

    protected $table = 'menus';

    protected $menuDisplay = false;


    public function subMenus()
    {
        return $this->hasMany('App\Menu', 'menu_parent');
    }

    public function supMenu()
    {
        return $this->belongsTo('App\Menu', 'menu_parent');
    }

    /**
     * @return mixed
     */
    public function getMenuDisplay()
    {
        return $this->menuDisplay;
    }

    /**
     * @param mixed $menuDisplay
     */
    public function setMenuDisplay($menuDisplay)
    {
        $this->menuDisplay = $menuDisplay;
    }



}
