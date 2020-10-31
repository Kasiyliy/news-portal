<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 29.10.2020
 * Time: 18:00
 */

namespace App\Http\Controllers\Web\V1\System;


use App\Core\Traits\WebToastTrait;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\MobileLinkWebForm;
use App\Http\Requests\Web\V1\System\Content\MobileLinkStoreOrUpdateWebRequest;
use App\Models\Entities\Content\MobileLink;

class MobileLinkController extends WebBaseController
{
    use WebToastTrait;

    public function index()
    {
        $items = MobileLink::all();
        return $this->adminView('pages.mobile-links.index', compact('items'));
    }

    public function storeUpdate(MobileLinkStoreOrUpdateWebRequest $request, $id = null)
    {
        $item = new MobileLink();
        if ($id) {
            $item = MobileLink::findOrFail($id);
        }
        $item->fill($request->all());
        $item->save();
        $this->added();
        return redirect()->back();
    }

    public function createEdit($id = null)
    {
        $item = new MobileLink();
        if ($id) {
            $item = MobileLink::findOrFail($id);
        }
        $form = MobileLinkWebForm::inputGroups($item);
        return $this->adminView('pages.mobile-links.create-edit', compact('item', 'form'));
    }

    public function delete($id)
    {
        $item = MobileLink::find($id);
        if ($item) {
            $item->delete();
        }
        $this->deleted();
        return redirect()->back();
    }
}