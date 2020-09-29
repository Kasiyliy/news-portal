<?php


namespace App\Http\Controllers\Web\V1\System\Forum;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\Forum\ForumCategoryWebForm;
use App\Http\Requests\Web\V1\System\Content\Forum\ForumCategoryWebRequest;
use App\Models\Entities\Content\Forum\ForumCategory;

class ForumCategoryController extends WebBaseController
{
    public function index()
    {
        $categories = ForumCategory::where('parent_category_id',null)->orderBy('updated_at', 'desc')->paginate(10);
        $category_web_form = ForumCategoryWebForm::inputGroups(null);
        return $this->adminView('pages.forum.categories.index', compact('categories', 'category_web_form'));
    }

    public function store(ForumCategoryWebRequest $request)
    {

        ForumCategory::create([
                'name' => $request->name,
            ]);
            $this->added();
            return redirect()->route('forum.index');

    }

    public function update($id, ForumCategoryWebRequest $request)
    {
            $category = ForumCategory::find($id);
            if (!$category) throw new WebServiceExplainedException('Категория не найдена!');

            $category->update([
                'name' => $request->name,
            ]);

            $this->edited();
            return redirect()->route('forum.index');
    }

    public function delete($id){
        $category = ForumCategory::find($id);
        if (!$category) throw new WebServiceExplainedException('Категория не найдена!');
        $category->childCategories()->delete();
        $category->delete();
        $this->deleted();
        return redirect()->route('forum.index');

    }


    public function childCategory($category_id)
    {
        $categories = ForumCategory::where('parent_category_id',$category_id)->orderBy('updated_at', 'desc')->paginate(10);
        $category_web_form = ForumCategoryWebForm::inputGroups(null);
        $parent_category = ForumCategory::find($category_id);
        return $this->adminView('pages.forum.categories.child', compact('category_id','categories', 'category_web_form','parent_category'));
    }

    public function childCategoryStore($category_id,ForumCategoryWebRequest $request)
    {
            ForumCategory::create([
                'name' => $request->name,
                'parent_category_id' => $category_id
            ]);
            $this->added();
            return redirect()->route('forum.category.index', ['category_id' => $category_id]);

    }

    public function childCategoryUpdate($category_id, ForumCategoryWebRequest $request)
    {

            $category = ForumCategory::find($category_id);
            if (!$category) throw new WebServiceExplainedException('Категория не найдена!');


            $category->update([
                'name' => $request->name,
            ]);

            $this->edited();
            return redirect()->route('forum.category.index', ['category_id' => $category->parent_category_id]);

    }

    public function childCategoryDelete($id)
    {

        $category = ForumCategory::find($id);
        if (!$category) throw new WebServiceExplainedException('Категория не найдена!');
        $parent_category_id = $category->parent_category_id;
        $category->delete();
        $this->deleted();
        return redirect()->route('forum.category.index', ['category_id' =>$parent_category_id]);

    }
}
