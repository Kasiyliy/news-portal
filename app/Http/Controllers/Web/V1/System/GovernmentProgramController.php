<?php

namespace App\Http\Controllers\Web\V1\System;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\GovernmentProgramWebForm;
use App\Http\Requests\Web\V1\System\Content\GovernmentProgramWebRequest;
use App\Models\Entities\Content\GovernmentProgram;
use Illuminate\Http\Request;

class GovernmentProgramController extends WebBaseController
{
    public function index() {
        $programs = GovernmentProgram::orderBy('updated_at', 'desc')->paginate(10);
        return $this->adminView('pages.programs.index', compact('programs'));
    }

    public function create() {
        $program_web_form = GovernmentProgramWebForm::inputGroups(null);
        return $this->adminView('pages.programs.create', compact('program_web_form'));
    }

    public function store(GovernmentProgramWebRequest $request) {
        GovernmentProgram::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        $this->added();
        return redirect()->route('programs.index');
    }

    public function edit($id) {
        $program = $this->checkId($id);
        $program_web_form = GovernmentProgramWebForm::inputGroups($program);
        return $this->adminView('pages.programs.edit', compact('program_web_form', 'program'));

    }

    public function update($id, GovernmentProgramWebRequest $request) {
        $program = $this->checkId($id);
        $program->name = $request->name;
        $program->description = $request->description;
        $program->digital_help = $request->digital_help;
        $program->traditional_help = $request->traditional_help;
        $program->save();
        $this->edited();
        return redirect()->route('programs.index');
    }

    public function delete($id) {
        $program = $this->checkId($id);
        $program->delete();
        $this->deleted();
        return redirect()->route('programs.index');

    }

    private function checkId($id) {
        $program = GovernmentProgram::find($id);
        if(!$program) throw new WebServiceExplainedException('Прорамма не найдена!');
        return $program;
    }
}
