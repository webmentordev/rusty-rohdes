<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index() {
        $servers = Server::get();
        $result_data = [];
        foreach($servers as $item){
            $data = Http::get('https://api.battlemetrics.com/servers/'.$item->battlematric);
            array_push($result_data, [
                'name' => $data['data']['attributes']['name'],
                'ip' => $data['data']['attributes']['ip'],
                'port' => $data['data']['attributes']['port'],
                'players' => $data['data']['attributes']['players'],
                'max' => $data['data']['attributes']['maxPlayers'],
                'percentage' => ($data['data']['attributes']['players'] / $data['data']['attributes']['maxPlayers']) * 100,
                'status' => $data['data']['attributes']['status'],
                'type' => $data['data']['attributes']['details']['rust_settings']['groupLimit'],
                'region' => $data['data']['attributes']['country'],
                'background' => $data['data']['attributes']['details']['rust_headerimage']
            ]);
        }
        return view('home', [
            'servers' => $result_data
        ]);
    }
}
