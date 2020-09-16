<?php

namespace App\Http\Controllers\Web\V1\System\Prominent;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\Prominent\ProminentAreaWebForm;
use App\Http\Requests\Web\V1\System\Content\Prominent\ProminentAreaWebRequest;
use App\Models\Entities\Content\Prominent\ProminentArea;

class ProminentAreaController extends WebBaseController
{
    public function index() {
        $areas = ProminentArea::paginate(10);
        $area_web_form = ProminentAreaWebForm::inputGroups(null);
        return $this->adminView('pages.prominent.areas.index', compact('areas', 'area_web_form'));
    }

    public function store(ProminentAreaWebRequest $request) {
        ProminentArea::create([
            'name' => $request->name
        ]);
        $this->added();
        return redirect()->route('prominent.area.index');
    }

    public function update(ProminentAreaWebRequest $request, $id) {
        $area = $this->checkExist($id);
        $area->name = $request->name;
        $area->save();
        $this->edited();
        return redirect()->route('prominent.area.index');
    }

    public function delete($id) {
        $area = $this->checkExist($id);
        $area->delete();
        $this->deleted();
        return redirect()->route('prominent.area.index');
    }

    private function checkExist($id) {
        $area = ProminentArea::find($id);
        if(!$area) throw new WebServiceExplainedException('Район не найден!');
        return $area;
    }
}
