<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $models = Agent::where('parent_id', 0)->get();

        return view('admin.agent', ['models' => $models]);
    }

    public function store(AgentRequest $request)
    {

        $agent = new Agent;
        $agent->name = $request->name;
        if (!empty($request->parent_id)) {
            $agent->parent_id = $request->parent_id;
        }
        $agent->phone = $request->phone;
        $agent->save();

        return redirect()->route('agent.index');
    }

    public function getChildren($id)
    {
        $children = Agent::where('parent_id', $id)->get();
        return view('admin.agent', ['models' => $children]);
    }
    

}
