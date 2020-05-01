<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Gallery;


class PageController extends Controller
{
    public function execute($alias) {

        if(!$alias) {
            abort(404);
        }

        if (view()->exists('site.gallery')) {
            $page = Page::where('alias', strip_tags($alias))->first();
            $data = [
                'title' => $page->name,
                'page' => $page
            ];
            return view('site.gallery', $data);
        } else {
            abort(404);
        }
    }
}
