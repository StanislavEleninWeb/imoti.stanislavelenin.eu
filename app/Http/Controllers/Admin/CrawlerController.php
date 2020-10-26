<?php

namespace App\Http\Controllers\Admin;

use App\CrawledUrlEntry;
use App\Http\Crawler\Crawler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrawlerController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('crawler.admin.index', [
        	'entries' => CrawledUrlEntry::all()
        ]);
    }

    /**
     * start the application crawler.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $crawler = new Crawler;
        $crawler->start();

        return redirect()->back();
    }
}
