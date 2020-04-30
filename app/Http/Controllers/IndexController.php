<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Portfolio;
use App\Employee;
use App\Service;
use Illuminate\Support\Facades\Mail;
use function foo\func;


class IndexController extends Controller
{
    public function execute(Request $request) {

        if($request->isMethod('POST')) {

            $messages = [
                'required' => "Поле :attribute обязательно к заполнению" ,
                'email' => "Поле :attribute должно соответствовать email адресу"
            ];

            $this->validate($request,
                [
                   'name' =>'required|max:255',
                   'phone'=>'required',
                   'email'=>'required|email',
                   'text'=>'required'
                ], $messages);

            $data = $request->all();

            //mail
                Mail::send('site.email', ['data'=>$data], function($message) use ($data) {
                // Почта куда приходят письма
                $mailAdmin = env('MAIL_ADMIN');
                // Данные для отправки
                $message->from($data['email'], $data['name']);
                // Куда отправить и название темы
                $message->to($mailAdmin)->subject('Question');

                    return redirect()
                        ->route('home')
                        ->with(['status' => 'Успешно отправлено']);
            });
            if (session('status')) {
                $request->session()->forget('status'); // удаление из сессии
            }
        }

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
