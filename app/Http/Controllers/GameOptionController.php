<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\GameOption;
use App\Http\Resources\GameOption as GameOptionResorce;

class GameOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gameOption = GameOption::paginate(1);
        return GameOptionResorce::collection($gameOption);
    }
    /**
     * Display a listing of the resource.
     * @param string $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $gameOption = GameOption::findOrFail($uuid);
        return new GameOptionResorce($gameOption);
    }
}
