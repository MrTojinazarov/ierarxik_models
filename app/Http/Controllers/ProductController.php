<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Agent;
use App\Models\AgentProduct;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $agentProducts = AgentProduct::with(['agent', 'product'])->get();
        $models = Agent::where('parent_id', 0)->get();
        return view('admin.product', ['models' => $models, 'agentProducts' => $agentProducts]);
    }

    public function getChildren($id)
    {
        $agentProducts = AgentProduct::with(['agent', 'product'])->get();
        $children = Agent::where('parent_id', $id)->get();
        return view('admin.product', ['models' => $children, 'agentProducts' => $agentProducts]);
    }
    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
        ]);
    
        if ($request->agent_id && $request->price) {
            $this->createAgentProduct($request->agent_id, $product->id, $request->price);
        }
    
        return redirect()->back()->with('success', 'Mahsulot muvaffaqiyatli yaratildi!');
    }

    private function createAgentProduct($agentId, $productId, $price)
    {
        AgentProduct::create([
            'agent_id' => $agentId,
            'product_id' => $productId,
            'price' => $price,
        ]);
    
        $childAgents = Agent::where('parent_id', $agentId)->get();
    
        foreach ($childAgents as $childAgent) {
            $this->createAgentProduct($childAgent->id, $productId, $price);
        }
    }
    

}
