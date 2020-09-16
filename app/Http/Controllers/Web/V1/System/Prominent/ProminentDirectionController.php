<?php

namespace App\Http\Controllers\Web\V1\System\Prominent;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\Prominent\ProminentDirectionWebForm;
use App\Http\Requests\Web\V1\System\Content\Prominent\ProminentDirectionWebRequest;
use App\Models\Entities\Content\Prominent\ProminentDirection;
use Illuminate\Http\Request;

class ProminentDirectionController extends WebBaseController
{
    public function index() {
        $directions = ProminentDirection::paginate(1);
        $direction_web_form = ProminentDirectionWebForm::inputGroups(null);
        return $this->adminView('pages.prominent.directions.index', compact('directions', 'direction_web_form'));
    }

    public function store(ProminentDirectionWebRequest $request) {
        ProminentDirection::create([
            'name' => $request->name
        ]);
        $this->added();
        return redirect()->route('prominent.direction.index');
    }

    public function update($id, ProminentDirectionWebRequest $request) {
        $direction = $this->checkExist($id);
        $direction->name = $request->name;
        $direction->save();
        $this->edited();
        return redirect()->route('prominent.direction.index');

    }

    public function delete($id) {
        $direction = $this->checkExist($id);
        $direction->delete();
        $this->deleted();
        return redirect()->route('prominent.direction.index');
    }

    private function checkExist($id) {
        $direction = ProminentDirection::find($id);
        if(!$direction) throw new WebServiceExplainedException('Направление не найдено!');
        return $direction;
    }
}
