<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ItemResource;
use App\Item;


class ItemAPIController extends Controller
{
    public function index(){
    	return ItemResource::collection(Item::paginate(10));
    }
}
