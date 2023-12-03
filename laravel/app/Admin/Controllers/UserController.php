<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('ID'));
        $grid->column('name', __('名前'));
        $grid->column('email', __('メールアドレス'));
        // $grid->column('email_verified_at', __('Email verified at'));
        // $grid->column('password', __('Password'));
        // $grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('登録日'))->display(function($created) {
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('名前'));
        $show->field('email', __('メールアドレス'));
        // $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('パスワード'));
        // $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('登録日'))->display(function($created) {
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
        $form = new Form(new User());

        $form->text('name', __('名前'));
        $form->email('email', __('メールアドレス'));
        // $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('パスワード'));
        // $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
