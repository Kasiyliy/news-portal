<?php

namespace App\Http\Controllers\Web\V1\System\Prominent;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\Prominent\ProminentUserWebForm;
use App\Http\Requests\Web\V1\System\Content\Prominent\ProminentUserWebRequest;
use App\Models\Entities\Content\Prominent\ProminentUser;
use App\Models\Entities\Content\Prominent\ProminentUserDirection;
use App\Services\Common\V1\Support\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProminentUserController extends WebBaseController
{
    protected $fileService;

    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index()
    {
        $users = ProminentUser::with('directions.direction', 'area')->paginate(10);
        return $this->adminView('pages.prominent.users.index', compact('users'));
    }

    public function create()
    {
        $user_web_form = ProminentUserWebForm::inputGroups(null);
        return $this->adminView('pages.prominent.users.create', compact('user_web_form'));

    }

    public function store(ProminentUserWebRequest $request)
    {
        $path = null;
        try {
            DB::beginTransaction();
            $path = $this->fileService->store($request->avatar, ProminentUser::DEFAULT_RESOURCE_DIRECTORY);
            $user = ProminentUser::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'patronymic' => $request->patronymic,
                'area_id' => $request->area,
                'birth_date' => $request->birth_date,
                'sex' => $request->sex,
                'biography' => $request->biography,
                'works' => $request->works,
                'extra_information' => $request->extra_information,
                'avatar_path' => $path,
            ]);
            $directions = array();
            foreach ($request->directions as $direction_id) {
                $directions[] = [
                    'prominent_user_id' => $user->id,
                    'direction_id' => $direction_id,
                    'created_at' => now(),
                    'updated_at' => now()];
            }
            ProminentUserDirection::insert($directions);
            $this->added();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            if ($path) $this->fileService->remove($path);
            throw new WebServiceExplainedException($exception->getMessage());
        }
        return redirect()->route('prominent.user.index');

    }

    public function edit($id)
    {
        $user = $this->checkExist($id);
        $user_web_form = ProminentUserWebForm::inputGroups($user);
        return $this->adminView('pages.prominent.users.edit', compact('user_web_form', 'user'));
    }

    public function update(ProminentUserWebRequest $request, $id)
    {
        $path = null;
        try {
            $user = $this->checkExist($id);
            $old_path = $user->avatar_path;
            DB::beginTransaction();
            if($request->avatar)
                $path = $this->fileService->updateWithRemoveOrStore($request->avatar,
                    ProminentUser::DEFAULT_RESOURCE_DIRECTORY, $old_path);
            $user->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'patronymic' => $request->patronymic,
                'area_id' => $request->area,
                'birth_date' => $request->birth_date,
                'sex' => $request->sex,
                'biography' => $request->biography,
                'works' => $request->works,
                'extra_information' => $request->extra_information,
                'avatar_path' => $path ? $path : $old_path,
            ]);
            if($request->directions) {
                $user->directions()->delete();
                $directions = array();
                foreach ($request->directions as $direction_id) {
                    $directions[] = [
                        'prominent_user_id' => $user->id,
                        'direction_id' => $direction_id,
                        'created_at' => now(),
                        'updated_at' => now()];
                }
                ProminentUserDirection::insert($directions);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            if ($path) $this->fileService->remove($path);
            throw new WebServiceExplainedException($exception->getMessage());
        }
        return redirect()->route('prominent.user.index');
    }

    public function delete($id)
    {

    }

    private function checkExist($id)
    {
        $user = ProminentUser::where('id', $id)->with('directions')->first();
        if (!$user) throw new WebServiceExplainedException('Пользователь не найден!');
        return $user;
    }
}
