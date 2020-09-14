<?php

namespace App\Http\Controllers\Web\V1\System;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\TeenagerGroupWebForm;
use App\Http\Requests\Web\V1\System\Content\TeenagerGroupWebRequest;
use App\Models\Entities\Content\TeenagerGroup;
use Illuminate\Http\Request;

class TeenagerGroupController extends WebBaseController
{
    public function index() {
        $groups = TeenagerGroup::orderBy('updated_at', 'desc')->paginate(10);
        return $this->adminView('pages.groups.index', compact('groups'));
    }

    public function create() {
        $group_web_form = TeenagerGroupWebForm::inputGroups(null);
        return $this->adminView('pages.groups.create', compact('group_web_form'));
    }

    public function store(TeenagerGroupWebRequest $request) {
        TeenagerGroup::create([
           'name' => $request->name,
           'description' => $request->description
        ]);
        $this->added();
        return redirect()->route('groups.index');
    }

    public function edit($id) {
        $group = TeenagerGroup::find($id);
        if(!$group) throw new WebServiceExplainedException('Группа не найдена!');
        $group_web_form = TeenagerGroupWebForm::inputGroups($group);
        return $this->adminView('pages.groups.edit', compact('group_web_form', 'group'));

    }

    public function update($id, TeenagerGroupWebRequest $request) {
        $group = TeenagerGroup::find($id);
        if(!$group) throw new WebServiceExplainedException('Группа не найдена!');
        $group->name = $request->name;
        $group->description = $request->description;
        $group->save();
        $this->edited();
        return redirect()->route('groups.index');
    }

    public function delete($id) {
        $group = TeenagerGroup::find($id);
        if(!$group) throw new WebServiceExplainedException('Группа не найдена!');
        $group->delete();
        $this->deleted();
        return redirect()->route('groups.index');

    }
}
