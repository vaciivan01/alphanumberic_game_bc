<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\GameOption;
use App\Http\Resources\GameOption as GameOptionResorce;
use Illuminate\Support\Facades\Validator;

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
        $gameOption = GameOption::where('uuid', '=', $uuid)->firstOrFail();
        return new GameOptionResorce($gameOption);
        return $uuid;
    }

    public function create(Request $request)
    {
        $rules = [
            'id' => 'required',
            'easy'    => 'required',
            'medium' => 'required',
            'hard' => 'required',
        ];

        $input     = $request->only('id', 'easy','medium','hard');
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => 'something went wrong']);
        }
        $data = json_encode([
            'easy' => $request->easy,
            'medium' => $request->medium,
            'hard' => $request->hard,
            ]
        );

        $uuid = $request->id;
        $user     = GameOption::updateOrCreate(['uuid' => $uuid], ['uuid' => $uuid, 'game_option' => $data]);
        return ['result' => 'success'];
    }
}
