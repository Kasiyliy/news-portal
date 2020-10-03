<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Content\Faq\FaqCategory;
use App\Models\Entities\Content\GuideCategory;
use Illuminate\Http\Request;

class GuideFaqController extends WebBaseController
{
    public function guide(Request $request)
    {
        $categories = GuideCategory::with('contents')->get();
        $i = 0;
        if ($request->category_id) {
            $currentCategory = $categories->where('id', $request->category_id)->first();
        }
        else {
            $currentCategory = $categories->first();
        }
        if (!$currentCategory) throw new WebServiceExplainedException('Контент табылған жоқ!');

        return $this->frontView('pages.guide-faqs.guide', compact('categories', 'i', 'currentCategory'));
    }

    public function guideFaq() {
        return $this->frontView('pages.guide-faqs.guide-faqs');
    }

    public function faqs(Request $request) {
        $categories = FaqCategory::with('questions')->get();
        $i = 0;
        if ($request->category_id) {
            $currentCategory = $categories->where('id', $request->category_id)->first();
            if (!$currentCategory) throw new WebServiceExplainedException('Контент табылған жоқ!');
        }
        else {
            $currentCategory = $categories->first();
        }
        if (!$currentCategory) throw new WebServiceExplainedException('Контент табылған жоқ!');

        return $this->frontView('pages.guide-faqs.faqs', compact('categories', 'i', 'currentCategory'));

    }
}
