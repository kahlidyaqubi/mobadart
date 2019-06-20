<?php

namespace App\Http\Controllers\Guest;

use App\City;
use App\Governorate;
use App\Initiative;
use App\Interest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InitiativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (auth()->user() && auth()->user()->activist) {
            $the_item = auth()->user()->activist;
            if ($request["interests_ids"] == "" && $request->all()==null) {
                $request["interests_ids"] = $the_item->interests()->pluck('interests.id')->toArray();
            }
        }

        $q = $request["q"] ?? "";
        $city_id = $request["city_id"] ?? "";
        $governorate_id = $request["governorate_id"] ?? "";
        $start_date = $request["start_date"] ?? "";
        $end_date = $request["end_date"] ?? "";
        $in_date = $request["in_date"] ?? "";
        $interests_ids = $request["interests_ids"] ?? "";


        $items = Initiative::whereRaw('initiatives.paid_up >= initiatives.donation')
            ->leftJoin('admins', 'admin_id', 'admins.id')
            ->leftJoin('users', 'user_id', 'users.id')
            ->leftJoin('cities', 'city_id', 'cities.id')
            ->whereRaw(true);


        if ($q)
            $items->whereRaw("(initiatives.title like ? or initiatives.team_name like ? or users.name like ?)"
                , ["%$q%", "%$q%", "%$q%"]);

        if ($city_id)
            $items->where('cities.id', '=', $city_id);

        if (($governorate_id) && !($city_id)) {
            $cities_ids = City::where('governorate_id', $governorate_id)->pluck('id')->toArray();
            $items->whereIn('cities.id', $cities_ids);
        }



        if ($interests_ids) {
            if ($interests_ids[0] != null || count($interests_ids) > 1) {
                foreach ($interests_ids as $interest_id) {
                    $items->whereHas('interests', function ($q) use ($interest_id) {
                        $q->where('interests.id', $interest_id);
                    });
                }

            }
        }

        if (($end_date) && ($start_date)) {
            $items = $items->whereRaw("end_date <= ? and start_date >= ?", [$end_date, $start_date]);
        } else {
            if ($start_date)
                $items = $items->whereRaw("start_date = ?", [$start_date]);

            if ($end_date)
                $items = $items->whereRaw("end_date = ?", [$end_date]);
        }
        if ($in_date)
            $items = $items->whereRaw("end_date >= ? and start_date <= ?", [$in_date, $in_date]);

        $items = Initiative::whereIn('id', $items->pluck('initiatives.id'))->orderBy("initiatives.id", "desc")->paginate(6)
            ->appends([
                "q" => $q, "city_id" => $city_id, 'governorate_id' => $governorate_id
                , "in_date" => $in_date, 'end_date' => $end_date
                , 'interests_ids' => $interests_ids,
                'start_date' => $start_date]);
        $cities = City::all();
        $governorates = Governorate::all();
        $interests = Interest::where('status', '1')->get();
        return view('guest.initiatives.index', compact('items', 'interests', 'governorate_id', 'governorates', 'cities', 'city_id'));


    }

    public function index_don(Request $request)
    {


        $q = $request["q"] ?? "";
        $city_id = $request["city_id"] ?? "";
        $governorate_id = $request["governorate_id"] ?? "";
        $start_date = $request["start_date"] ?? "";
        $end_date = $request["end_date"] ?? "";
        $in_date = $request["in_date"] ?? "";
        $interests_ids = $request["interests_ids"] ?? "";


        $items = Initiative::whereRaw('initiatives.paid_up < initiatives.donation')
            ->leftJoin('admins', 'admin_id', 'admins.id')
            ->leftJoin('users', 'user_id', 'users.id')
            ->leftJoin('cities', 'city_id', 'cities.id')
            ->whereRaw(true);


        if ($q)
            $items->whereRaw("(initiatives.title like ? or initiatives.team_name like ? or users.name like ?)"
                , ["%$q%", "%$q%", "%$q%"]);

        if ($city_id)
            $items->where('cities.id', '=', $city_id);

        if (($governorate_id) && !($city_id)) {
            $cities_ids = City::where('governorate_id', $governorate_id)->pluck('id')->toArray();
            $items->whereIn('cities.id', $cities_ids);
        }


        if ($interests_ids) {
            if ($interests_ids[0] != null || count($interests_ids) > 1) {
                foreach ($interests_ids as $interest_id) {
                    $items->whereHas('interests', function ($q) use ($interest_id) {
                        $q->where('interests.id', $interest_id);
                    });
                }

            }
        }

        if (($end_date) && ($start_date)) {
            $items = $items->whereRaw("end_date <= ? and start_date >= ?", [$end_date, $start_date]);
        } else {
            if ($start_date)
                $items = $items->whereRaw("start_date = ?", [$start_date]);

            if ($end_date)
                $items = $items->whereRaw("end_date = ?", [$end_date]);
        }
        if ($in_date)
            $items = $items->whereRaw("end_date >= ? and start_date <= ?", [$in_date, $in_date]);

        $items = Initiative::whereIn('id', $items->pluck('initiatives.id'))->orderBy("initiatives.id", "desc")->paginate(6)
            ->appends([
                "q" => $q, "city_id" => $city_id, 'governorate_id' => $governorate_id
                , "in_date" => $in_date, 'end_date' => $end_date
                , 'interests_ids' => $interests_ids,
                'start_date' => $start_date]);
        $cities = City::all();
        $governorates = Governorate::all();
        $interests = Interest::where('status', '1')->get();
        return view('guest.initiatives.index_don', compact('items', 'interests', 'governorate_id', 'governorates', 'cities', 'city_id'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Initiative::find($id);
        if ($item == NULL) {
            return redirect("/no_accsess");
        }

        $hisinterests = $item->interests->all();
        $hisgoals = $item->initiatives_goals->all();
        $hisactivities = $item->activities->all();
        return view('guest.initiatives.show', compact('hisactivities', 'hisinterests', 'hisgoals', 'item'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showCalender($id)
    {
        //showCalender
    }

    public function activityInInitiave($id)
    {
        //showCalender
    }
}
