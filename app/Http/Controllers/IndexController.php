<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Portfolio;
use App\Employee;
use App\Service;


class IndexController extends Controller
{
    public function execute(Request $request) {
        $pages = Page::all();
        $portfolios = Portfolio::get(['name', 'filter', 'images']);
        $services = Service::all();
        $employees = Employee::all();

        $tags = Portfolio::distinct()->pluck('filter');

        $menu = [];
        foreach ($pages as $page) {
            $item = [
                'title' => $page->name,
                'alias' => $page->alias,
            ];
            array_push($menu, $item);
        }
        $item = ['title' => 'Услуги', 'alias' => 'service'];
        array_push($menu, $item);

        $item = ['title' => 'Подарки', 'alias' => 'Portfolio'];
        array_push($menu, $item);

        $item = ['title' => 'Команда', 'alias' => 'team'];
        array_push($menu, $item);

        $item = ['title' => 'Контакты', 'alias' => 'contact'];
        array_push($menu, $item);

        return view('site.index', compact('menu', 'pages', 'services', 'portfolios', 'employees', 'tags'));
    }
}
