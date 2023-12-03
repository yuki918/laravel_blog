<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
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

        $grid->column('id', __('記事ID'));
        $grid->column('title', __('タイトル'));
        $grid->column('article_category_id', __('カテゴリー名'))->display(function($categoryId) {
            return ArticleCategory::find($categoryId)->name;
        });
        $grid->column('is_user', __('ログイン限定'))->display(function($user) {
            return ($user === 0) ? 'いいえ' : 'はい';
        });
        $grid->column('is_pickup', __('ピックアップ記事'))->display(function($pickup) {
            return ($pickup === 0) ? 'いいえ' : 'はい';
        });
        $grid->column('is_public', __('公開状態'))->display(function($public) {
            return ($public === 0) ? '未公開' : '公開';
        });
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
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('記事ID'));
        $show->field('title', __('タイトル'));
        $show->field('body', __('コンテンツ'));
        $show->field('thumbnail_path', __('サムネイル'));
        $show->field('article_category_id', __('カテゴリー名'));
        $show->field('is_user', __('ログイン限定'));
        $show->field('is_pickup', __('ピックアップ記事'));
        $show->field('is_public', __('公開状態'));
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
        $form = new Form(new Article());

        $form->text('title', __('タイトル'));
        $form->ckeditor('body', __('コンテンツ'));
        $form->image('thumbnail_path', __('サムネイル'));
        $form->select('article_category_id', 'カテゴリー名')->options(ArticleCategory::all()->pluck('name', 'id'))->value(1); // 変更
        $form->radio('is_user', 'ログイン限定')->options(['いいえ' , 'はい']);
        $form->radio('is_pickup', 'ピックアップ記事')->options(['いいえ' , 'はい']);
        $form->radio('is_public', '公開状態')->options(['非公開' , '公開']);

        return $form;
    }
}