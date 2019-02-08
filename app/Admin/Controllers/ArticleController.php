<?php

namespace App\Admin\Controllers;

use App\Article;
use App\Category;

use App\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use App\Admin\Validate as validate;

class ArticleController extends Controller
{
    use ModelForm;

    protected $admin_id;



/*    public function __construct()
    {
        if(!Admin::user()){
            redirect('admin/Auth/login');
        };
        $this->admin_id = Admin::user()->id;
    }*/

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Articles');
            $content->description('All My Fucking Blogs Are Here La');
            $content->body($this->grid());
            // 添加面包屑导航 since v1.5.7
//            $content->breadcrumb(
//                ['text' => '首页', 'url' => '/admin'],
//                ['text' => '用户管理', 'url' => '/admin/users'],
//                ['text' => '编辑用户']
//            );
        });
    }


    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');
            $content->body($this->form()->edit($id));
        });
    }


    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('Create Article');
            $content->description('Write something in here');
            $content->body($this->form());
        });
    }


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Article::class, function (Grid $grid) {

            $grid->id('id')->sortable();
            $grid->first_title();
            $grid->created_at();
            $grid->updated_at();
        });
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        $user_id = Admin::user()->id;
        $categorys = Category::whereUserId($user_id)->orderBy('created_at')->get(['id','name'])->toArray();
        $categorys = array_column($categorys, 'name');
        return Admin::form(Article::class, function (Form $form) use ($categorys) {
            $form->text('first_title', '一级标题')->rules('required');
            $form->text('second_title', '二级标题')->rules('required');
            $form->text('description', '文章描述')->rules('required');
            $form->image('img', '主图')->rules('required');
            $form->tags('categories','分类')->options($categorys);
            $form->simditor('body', '文章内容');
            $form->tags('tags', '标签')->rules('required');
            $form->radio('private', '私有')->options(['0' => '私有', '1'=> '公开'])->default('0')->rules('required');
            $form->radio('stat', '草稿')->options(['0' => '保存为草稿', '1'=> '发布'])->default('0')->rules('required');
            $form->hidden('user_id',time())->rules('required')->default(time());
        });
    }


    /**
     * insert an article
    */
    public function store(Request $request, Article $article){
        //验证数据
        $user_id = Admin::user()->id;
        $this->validate($request, validate\Article::$rules, [], validate\Article::$nicename);

        $article->guard([]);
        $article->save($request->all());
        foreach($request->get('categories') as $value){
            if(!$value) continue;
            $category = Category::firstOrCreate(['name' => $value, 'user_id' => $user_id]);
            $category = 1;
        }
    }

}