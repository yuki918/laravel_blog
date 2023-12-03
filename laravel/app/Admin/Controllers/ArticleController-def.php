<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('body', __('Body'));
        $grid->column('thumbnail_path', __('Thumbnail path'));
        $grid->column('article_category_id', __('Article category id'));
        $grid->column('is_user', __('Is user'));
        $grid->column('is_pickup', __('Is pickup'));
        $grid->column('is_public', __('Is public'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('body', __('Body'));
        $show->field('thumbnail_path', __('Thumbnail path'));
        $show->field('article_category_id', __('Article category id'));
        $show->field('is_user', __('Is user'));
        $show->field('is_pickup', __('Is pickup'));
        $show->field('is_public', __('Is public'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article());

        $form->text('title', __('Title'));
        $form->textarea('body', __('Body'));
        $form->text('thumbnail_path', __('Thumbnail path'));
        $form->number('article_category_id', __('Article category id'));
        $form->switch('is_user', __('Is user'));
        $form->switch('is_pickup', __('Is pickup'));
        $form->switch('is_public', __('Is public'));

        return $form;
    }
}
