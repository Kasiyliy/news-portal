<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Content\Prominent\ProminentArea;
use App\Models\Entities\Content\Prominent\ProminentDirection;
use App\Models\Entities\Content\Prominent\ProminentUser;
use App\Models\Entities\Content\Prominent\ProminentUserDirection;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProminentController extends WebBaseController
{

    public function prominentDetail($id)
    {
        $user = ProminentUser::where('id', $id)->with('directions.direction', 'area')->first();
        if (!$user) {
            throw new WebServiceExplainedException('Не найдено!');
        }
        return $this->frontView('pages.prominent-detail', compact('user'));
    }


    public function prominent(Request $request)
    {
        $minAge = null;
        $maxAge = null;
        $selectedSex = null;
        $selectedArea = null;
        $selectedDirections = null;

        $users_query = ProminentUser::with('area');
        if ($request->directions) {
            $selectedDirections = explode(',', $request->directions);
            $ids = ProminentUserDirection::whereIn('direction_id', $selectedDirections)
                ->groupBy('prominent_user_id')
                ->distinct()
                ->pluck('prominent_user_id');
            $users_query = $users_query->whereIn('id', $ids);
        }
        if ($request->sex) {
            $selectedSex = $request->sex;
            $users_query = $users_query->where('sex', $selectedSex);
        }
        if ($request->area) {
            $selectedArea = $request->area;
            $users_query = $users_query->where('area_id', $selectedArea);
        }
        if ($request->minAge || $request->maxAge) {
            if ($request->minAge) $minAge = $request->minAge;
            if ($request->maxAge) $maxAge = $request->maxAge;
            $minDate = Carbon::today()->subYears($minAge);
            $maxDate = Carbon::today()->subYears($maxAge)->endOfDay();
            if ($request->minAge && $request->maxAge) {
                $users_query = $users_query->whereBetween('birth_date', [$maxDate, $minDate]);
            } else if ($request->minAge && !$request->maxAge) {
                $users_query = $users_query->whereDate('birth_date', '<=', $minDate);
            } else if (!$request->minAge && $request->maxAge) {
                $users_query = $users_query->whereDate('birth_date', '>=', $maxDate);
            }
        }

        $users = $users_query
            ->with('directions.direction')
            ->orderBy('prominent_users.updated_at', 'desc')
            ->paginate(10)
            ->appends(request()->query());
        $directions = ProminentDirection::all();
        $areas = ProminentArea::all();
        return $this->frontView('pages.prominent', compact('users', 'areas',
            'directions', 'selectedArea', 'selectedSex', 'maxAge', 'minAge', 'selectedDirections'));
    }
}
