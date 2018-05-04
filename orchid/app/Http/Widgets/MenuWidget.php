<?php

namespace App\Http\Widgets;

use Orchid\Platform\Widget\Widget;
use Orchid\Platform\Core\Models\Menu;

class MenuWidget extends Widget {

    /**
     * @return mixed
     */
    public function handler($typemenu = 'header')
    {
        $menu = Menu::where('lang', config('app.locale'))
            ->where('parent',0)
            ->where('type', $typemenu)->get();

        return view('partials.menu', [
            'menu'  => $menu,
        ]);
    }

}
