<?php

namespace App\Http\Controllers;

use App\Models\Meals;
use App\Models\Parse;
use Illuminate\Http\Request;

class MealsController extends Controller
{
    private $allowed = array(
        'id', 'rid', 'name', 'price', 'protien', 'sugar', 'calories',
        'fat', 'carbs', 'saturated_fat', 'na', 'P', 'K', 'status',
        'tag_style', 'tag_health', 'ingredient', 'ord', 'del', 'auth');
    private $required = array('rid', 'name', 'price', 'auth');

    // [GET] /api/meals             | get the entire list
    public function index()
    {
        $row = Meals::getList();
        return response() -> json(['success' => True, 'message' => '','data' => $row], 200);
    }
    
    // [GET] /api/meals/{id}        | get record by id ($meal)
    public function show($meals)
    {
        $data = Meals::getElementById($meals);
        return response() -> json(['success' => True, 'data' => $data], 200);
    }

    // [GET] /api/meals/create      | get the latest create record  | Admin
    public function create()
    {
        $data = Meals::latest()->first();
        return response() -> json(['success' => True, 'data' => $data], 200);

    }

    // [POST] /api/meals            | create one record             | Admin
    public function store(Request $request)
    {
        $parse = Parse::input($this->allowed, $this->required, $request);
        if ($parse != 200)
            return response() -> json(['success' => False, 'error' => Parse::Error_msg($parse)], $parse);
        $row = Meals::store($request);
        return response() -> json(['success' => True, 'data' => ''], 200);

    }
    
    // [PUT] /api/meals/{id}        | update record by id ($meal)   | Admin
    public function update(Request $request, $meals)
    {
        $parse = Parse::chk_update($this->allowed, $request);
        if ($parse != 200)
            return response() -> json(['success' => False, 'error' => Parse::Error_msg($parse)], $parse);
            $data = Meals::updateById($request, $meals);
        return response() -> json(['success' => True, 'data' => $data], 200);
    }

    // [DELETE] /api/meals/{id}     | delete record by id           | Admin
    public function destroy($meals)
    {
        $row = Meals::deleteById($meals);
        if (!$row)
        return response() -> json(['success' => False, 'error' => 'Meals not found.'], 200);
        return response() -> json(['success' => True], 200);
    }

    // [GET] /api/meals/{id}/edit
    public function edit($meals)
    {
        $data = Meals::getElementById($meals);
        return response() -> json(['success' => True, 'message' => '', 'data' => $data], 200);
    }
}
