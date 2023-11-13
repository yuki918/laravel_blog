<?php

namespace App\Admin\Controllers;

use App\Models\ArticleCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleCategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ArticleCategory';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ArticleCategory());

        $grid->column('id', __('カテゴリーID'));
        $grid->column('name', __('カテゴリー名'));
        $grid->column('created_at', __('作成日'))->display(function($created) {
            return date('Y年m月d日 H時i分s秒' ,strtotime($created));
        });
        $grid->column('updated_at', __('更新日'))->display(function($updated) {
            return date('Y年m月d日 H時i分s秒' ,strtotime($updated));
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ArticleCategory::findOrFail($id));

        $show->field('id', __('カテゴリーID'));
        $show->field('name', __('カテゴリー名'));
        $show->field('created_at', __('作成日'));
        $show->field('updated_at', __('更新日'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ArticleCategory());

        $form->text('name', __('カテゴリー名'));

        return $form;
    }
}