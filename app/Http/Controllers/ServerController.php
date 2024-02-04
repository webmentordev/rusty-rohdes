<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function index(){
        return view('server.index', [
            'servers' => Server::latest()->get()
        ]);
    }

    public function create(){
        return view('server.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255|string|unique:servers,name',
            'ip' => 'required|max:255|string',
            'port' => 'required|numeric',
            'battlematric' => 'required|numeric'
        ]);

        Server::create([
            'name' => $request->name,
            'ip_address' => $request->ip,
            'port' => $request->port,
            'battlematric' => $request->battlematric
        ]);

        return back()->with('success', 'Server has been added!');
    }


    public function update(Server $server){
        return view('server.update', [
            'server' => $server
        ]);
    }

    public function update_Server(Request $request, Server $server){
        $this->validate($request, [
            'name' => 'required|max:255|string',
            'ip' => 'required|max:255|string',
            'port' => 'required|numeric',
            'battlematric' => 'required|numeric'
        ]);

        $server->update([
            'name' => $request->name,
            'ip_address' => $request->ip,
            'port' => $request->port,
            'battlematric' => $request->battlematric
        ]);

        return back()->with('success', 'Server has been updated!');
    }

    public function delete(Server $server){
        $server->delete();
        return back()->with('success', 'Server has been deleted!!');
    }
}