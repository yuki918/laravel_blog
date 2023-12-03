<?php

namespace App\Admin\Controllers;

use App\Models\Contact;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ContactController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Contact';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Contact());

        $grid->column('id', __('ID'));
        $grid->column('name', __('お名前'));
        $grid->column('email', __('メールアドレス'));
        $grid->column('content', __('お問い合わせ内容'));
        $grid->column('created_at', __('お問い合わせ日'))->display(function($created) {
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
        $show = new Show(Contact::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('お名前'));
        $show->field('email', __('メールアドレス'));
        $show->field('content', __('お問い合わせ内容'));
        $show->field('created_at', __('お問い合わせ日'));
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
        $form = new Form(new Contact());

        $form->text('name', __('お名前'));
        $form->email('email', __('メールアドレス'));
        $form->textarea('content', __('お問い合わせ内容'));

        return $form;
    }
}
