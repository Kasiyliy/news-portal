<?php

namespace App\Http\Controllers\Web\V1\System\Map;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\MapRegion\MapRegionWebForm;
use App\Http\Requests\Web\V1\System\Content\Map\StoreAndUpdateMapWebRequest;
use App\Models\Entities\Content\Map\MapRegion;

class MapController extends WebBaseController
{
    public function index()
    {
        $mapRegions = MapRegion::paginate(10);
        return $this->adminView('pages.map-region.index', compact('mapRegions'));
    }

    public function storeAndUpdate(StoreAndUpdateMapWebRequest $request, $id = null)
    {
        if ($id) {
            $mapRegion = MapRegion::findOrFail($id);
        } else {
            $mapRegion = new MapRegion();

        }
        $mapRegion->fill($request->all());
        $mapRegion->save();
        return redirect()->route('map.region.index');
    }

    public function createAndEdit($id = null)
    {
        if ($id) {
            $mapRegion = MapRegion::findOrFail($id);
        } else {
            $mapRegion = new MapRegion();
        }
        $form = MapRegionWebForm::inputGroups($mapRegion);
        return $this->adminView('pages.map-region.create-edit', compact('mapRegion', 'form'));
    }
}
