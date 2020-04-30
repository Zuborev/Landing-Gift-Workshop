<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Portfolio;
use App\Employee;
use App\Service;
use Illuminate\Support\Facades\Mail;


class IndexController extends Controller
{
    public function execute() {

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

    public  function sendmail(Request $request) {

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

        Mail::send('site.email', ['data'=>$data], function($message) use ($data) {
                // Почта куда приходят письма
                $mailAdmin = env('MAIL_ADMIN');
                // Данные для отправки
                $message->from($data['email'], $data['name']);
                // Куда отправить и название темы
                $message->to($mailAdmin)->subject('Question');
            });

        return redirect()
            ->route('home')
            ->with('success', 'Письмо отправлено успешно');;
    }
}
