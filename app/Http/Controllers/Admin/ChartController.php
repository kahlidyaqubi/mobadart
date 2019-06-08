<?php

namespace App\Http\Controllers\Admin;

use App\Activist;
use App\Activists_initiative;
use App\City;
use DB;
use App\Governorate;
use App\Initiative;
use App\Interest;
use Illuminate\Http\Request;

class ChartController extends BaseController
{

    public function donationToInitiatives(Request $request)
    {
        $city_id = $request["city_id"] ?? "";
        $governorate_id = $request["governorate_id"] ?? "";
        $start_date = $request["start_date"] ?? "";
        $end_date = $request["end_date"] ?? "";
        $in_date = $request["in_date"] ?? "";
        $interests_ids = $request["interests_ids"] ?? "";
        $items = Initiative::select('title', 'paid_up')->whereRaw(true);
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


        $initiatives = json_encode($items->get());

        $cities = City::all();
        $governorates = Governorate::all();
        $interests = Interest::where('status', '1')->get();

        return view('admin.charts.donationToInitiatives', compact("initiatives", "cities", "governorates", "interests"));

    }

    public function activistTOInterests(Request $request)
    {

        $city_id = $request["city_id"] ?? "";
        $governorate_id = $request["governorate_id"] ?? "";
        $gender = $request["gender"] ?? "";
        $usefull = $request["usefull"] ?? "";
        $initiative_id = $request["initiative_id"] ?? "";

        $activistsbeforjeson = Interest::select('name')->withcount(['activists' => function ($items) use ($city_id, $governorate_id, $gender, $usefull, $initiative_id) {
            if ($city_id)
                $items->where('cities.id', '=', $city_id);

            if (($governorate_id) && !($city_id)) {
                $cities_ids = City::where('governorate_id', $governorate_id)->pluck('id')->toArray();
                $items->whereIn('cities.id', $cities_ids);
            }

            if ($gender)
                $items->where('activists.gender', '=', $gender);


            if ($usefull) {
                if ($usefull == 1) {
                    $activistsids = Activists_initiative::where('accept', 1)->pluck('activist_id');
                    $items->whereIn("activists.id"
                        , $activistsids);
                } else if ($usefull == 2) {
                    $activistsids = Activists_initiative::where('accept', 1)->pluck('activist_id');
                    $items->whereNotIn("activists.id"
                        , $activistsids);
                }
            }
            if ($initiative_id) {
                $activistsids = Initiative::find($initiative_id)->activists_initiatives->pluck('initiative_id');
                $items->whereIn("id"
                    , $activistsids);
            }

        }])->get();
        $activists = json_encode($activistsbeforjeson);

        $cities = City::all();
        $governorates = Governorate::all();
        $initiatives = Initiative::all();

        return view('admin.charts.activistTOInterests', compact("activists", "cities", "governorates", "initiatives"));

    }

    public function activistTOInitiatives(Request $request)
    {
        $city_id = $request["city_id"] ?? "";
        $governorate_id = $request["governorate_id"] ?? "";
        $gender = $request["gender"] ?? "";
        $usefull = $request["usefull"] ?? "";
        $interests_ids = $request["interests_ids"] ?? "";


        $activistsbeforjeson = Initiative::select('title')->withcount(['activists_initiatives' => function ($items) use ($city_id, $governorate_id, $gender, $usefull, $interests_ids) {

            $items->where('activists_initiatives.accept', '=', '1');

            $items->leftJoin('activists', 'activists_initiatives.activist_id', 'activists.id');

            if ($city_id)
                $items->where('cities.id', '=', $city_id);

            if (($governorate_id) && !($city_id)) {
                $cities_ids = City::where('governorate_id', $governorate_id)->pluck('id')->toArray();
                $items->whereIn('cities.id', $cities_ids);
            }

            if ($gender)
                $items->where('activists.gender', '=', $gender);


            if ($interests_ids) {
                if ($interests_ids[0] != null || count($interests_ids) > 1) {
                    foreach ($interests_ids as $interest_id) {
                        $items->whereHas('interests', function ($q) use ($interest_id) {
                            $q->where('interests.id', $interest_id);
                        });
                    }

                }
            }


            if ($usefull) {
                if ($usefull == 1) {
                    $activistsids = Activists_initiative::where('accept', 1)->pluck('activist_id');
                    $items->whereIn("activists.id"
                        , $activistsids);
                } else if ($usefull == 2) {
                    $activistsids = Activists_initiative::where('accept', 1)->pluck('activist_id');
                    $items->whereNotIn("activists.id"
                        , $activistsids);
                }
            }


        }])->get();
        $activists = json_encode($activistsbeforjeson);

        $cities = City::all();
        $governorates = Governorate::all();
        $initiatives = Initiative::all();
        $interests = Interest::where('status', '1')->get();

        return view('admin.charts.activistTOInitiatives', compact("activists", "cities", "governorates", "initiatives", "interests"));

    }

    public function activistTOCities(Request $request)
    {
        $city_id = $request["city_id"] ?? "";
        $governorate_id = $request["governorate_id"] ?? "";
        $gender = $request["gender"] ?? "";
        $usefull = $request["usefull"] ?? "";
        $initiative_id = $request["initiative_id"] ?? "";
        $interests_ids = $request["interests_ids"] ?? "";

        $activistsbeforjeson = City::select('name')->withcount(['activists' => function ($items) use ($city_id, $governorate_id, $gender, $usefull, $initiative_id, $interests_ids) {
            if ($city_id)
                $items->where('cities.id', '=', $city_id);

            if (($governorate_id) && !($city_id)) {
                $cities_ids = City::where('governorate_id', $governorate_id)->pluck('id')->toArray();
                $items->whereIn('cities.id', $cities_ids);
            }

            if ($gender)
                $items->where('activists.gender', '=', $gender);


            if ($interests_ids) {
                if ($interests_ids[0] != null || count($interests_ids) > 1) {
                    foreach ($interests_ids as $interest_id) {
                        $items->whereHas('interests', function ($q) use ($interest_id) {
                            $q->where('interests.id', $interest_id);
                        });
                    }

                }
            }


            if ($usefull) {
                if ($usefull == 1) {
                    $activistsids = Activists_initiative::where('accept', 1)->pluck('activist_id');
                    $items->whereIn("activists.id"
                        , $activistsids);
                } else if ($usefull == 2) {
                    $activistsids = Activists_initiative::where('accept', 1)->pluck('activist_id');
                    $items->whereNotIn("activists.id"
                        , $activistsids);
                }
            }
            if ($initiative_id) {
                $activistsids = Initiative::find($initiative_id)->activists_initiatives->pluck('initiative_id');
                $items->whereIn("id"
                    , $activistsids);
            }

        }])->get();
        $activists = json_encode($activistsbeforjeson);

        $cities = City::all();
        $governorates = Governorate::all();
        $initiatives = Initiative::all();
        $interests = Interest::where('status', '1')->get();

        return view('admin.charts.activistTOCities', compact("activists", "cities", "governorates", "initiatives", "interests"));
    }

    public function genderTOActivists(Request $request)
    {
        $city_id = $request["city_id"] ?? "";
        $governorate_id = $request["governorate_id"] ?? "";
        $gender = $request["gender"] ?? "";
        $usefull = $request["usefull"] ?? "";
        $initiative_id = $request["initiative_id"] ?? "";
        $interests_ids = $request["interests_ids"] ?? "";

        $items = DB::table('activists')
            ->select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->whereRaw(true);

        if ($city_id)
                $items->where('cities.id', '=', $city_id);

            if (($governorate_id) && !($city_id)) {
                $cities_ids = City::where('governorate_id', $governorate_id)->pluck('id')->toArray();
                $items->whereIn('cities.id', $cities_ids);
            }

            if ($gender)
                $items->where('activists.gender', '=', $gender);


            if ($interests_ids) {
                if ($interests_ids[0] != null || count($interests_ids) > 1) {
                    foreach ($interests_ids as $interest_id) {
                        $items->whereHas('interests', function ($q) use ($interest_id) {
                            $q->where('interests.id', $interest_id);
                        });
                    }

                }
            }


            if ($usefull) {
                if ($usefull == 1) {
                    $activistsids = Activists_initiative::where('accept', 1)->pluck('activist_id');
                    $items->whereIn("activists.id"
                        , $activistsids);
                } else if ($usefull == 2) {
                    $activistsids = Activists_initiative::where('accept', 1)->pluck('activist_id');
                    $items->whereNotIn("activists.id"
                        , $activistsids);
                }
            }
            if ($initiative_id) {
                $activistsids = Initiative::find($initiative_id)->activists_initiatives->pluck('initiative_id');
                $items->whereIn("id"
                    , $activistsids);
            }


        $activists = json_encode($items->get());

        $cities = City::all();
        $governorates = Governorate::all();
        $initiatives = Initiative::all();
        $interests = Interest::where('status', '1')->get();

        return view('admin.charts.genderTOActivists', compact("activists", "cities", "governorates", "initiatives", "interests"));

    }

    public function ageTOActivists(Request $request)
    {
        $city_id = $request["city_id"] ?? "";
        $governorate_id = $request["governorate_id"] ?? "";
        $gender = $request["gender"] ?? "";
        $usefull = $request["usefull"] ?? "";
        $initiative_id = $request["initiative_id"] ?? "";
        $interests_ids = $request["interests_ids"] ?? "";

        $minAge = 18;
        $maxDate = \Carbon\Carbon::today()->subYears($minAge)->endOfDay();

        $items_young_count = DB::table('activists')
            ->where('brth_day' ,'<' ,$maxDate)
            ->whereRaw(true);

        $items_old_count= DB::table('activists')
            ->where('brth_day' ,'>' ,$maxDate)
            ->whereRaw(true);

        if ($city_id) {
            $items_young_count->where('cities.id', '=', $city_id);
            $items_old_count->where('cities.id', '=', $city_id);
        }
        if (($governorate_id) && !($city_id)) {
            $cities_ids = City::where('governorate_id', $governorate_id)->pluck('id')->toArray();
            $items_young_count->whereIn('cities.id', $cities_ids);
            $items_old_count->whereIn('cities.id', $cities_ids);
        }

        if ($gender) {
            $items_young_count->where('activists.gender', '=', $gender);
            $items_old_count->whereIn('cities.id', $cities_ids);
        }

        if ($interests_ids) {
            if ($interests_ids[0] != null || count($interests_ids) > 1) {
                foreach ($interests_ids as $interest_id) {
                    $items_young_count->whereHas('interests', function ($q) use ($interest_id) {
                        $q->where('interests.id', $interest_id);
                    });

                    $items_old_count->whereHas('interests', function ($q) use ($interest_id) {
                        $q->where('interests.id', $interest_id);
                    });
                }

            }
        }


        if ($usefull) {
            if ($usefull == 1) {
                $activistsids = Activists_initiative::where('accept', 1)->pluck('activist_id');
                $items_young_count->whereIn("activists.id"
                    , $activistsids);
                $items_old_count->whereIn("activists.id"
                    , $activistsids);
            } else if ($usefull == 2) {
                $activistsids = Activists_initiative::where('accept', 1)->pluck('activist_id');
                $items_young_count->whereNotIn("activists.id"
                    , $activistsids);
                $items_old_count->whereNotIn("activists.id"
                    , $activistsids);
            }
        }
        if ($initiative_id) {
            $activistsids = Initiative::find($initiative_id)->activists_initiatives->pluck('initiative_id');
            $items_young_count->whereIn("id"
                , $activistsids);
            $items_old_count->whereIn("id"
                , $activistsids);
        }


        $items_young_count = $items_young_count->count();
        $items_old_count = $items_old_count->count();
        $cities = City::all();
        $governorates = Governorate::all();
        $initiatives = Initiative::all();
        $interests = Interest::where('status', '1')->get();

        return view('admin.charts.ageTOActivists', compact("items_young_count","items_old_count", "cities", "governorates", "initiatives", "interests"));

    }
}
