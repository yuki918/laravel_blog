<?php

namespace App\Admin\Controllers;

use App\Models\Comment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CommentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Comment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Comment());

        $grid->column('id', __('ID'));
        $grid->column('name', __('名前'));
        $grid->column('content', __('コメント'));
        $grid->column('article_id', __('記事のID'));
        $grid->column('user_id', __('ユーザーのID'));
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
        $show = new Show(Comment::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('名前'));
        $show->field('content', __('コメント'));
        $show->field('article_id', __('記事のID'));
        $show->field('user_id', __('ユーザーのID'));
        $show->field('created_at', __('作成日'))->display(function($created) {
            return date('Y年m月d日 H時i分s秒' ,strtotime($created));
        });
        $show->field('updated_at', __('更新日'))->display(function($updated) {
            return date('Y年m月d日 H時i分s秒' ,strtotime($updated));
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Comment());

        $form->text('name', __('名前'));
        $form->textarea('content', __('コメント'));
        // $form->number('article_id', __('記事のID'));
        // $form->number('user_id', __('ユーザーのID'));

        return $form;
    }
}
