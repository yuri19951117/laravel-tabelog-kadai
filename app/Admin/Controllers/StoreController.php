<?php

namespace App\Admin\Controllers;

use App\Models\Store;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StoreController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Store';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Store());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('name', __('Name'));
        $grid->column('category_id', __('Category id'));
        $grid->column('img', __('Img'));
        $grid->column('description', __('Description'));
        $grid->column('opening_time', __('Opening time'));
        $grid->column('closing_time', __('Closing time'));
        $grid->column('lowest_price', __('Lowest price'));
        $grid->column('highest_price', __('Highest price'));
        $grid->column('post_code', __('Post code'));
        $grid->column('address', __('Address'));
        $grid->column('phone_number', __('Phone number'));
        $grid->column('holiday', __('Holiday'));
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

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
        $show = new Show(Store::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('category_id', __('Category id'));
        $show->field('img', __('Img'));
        $show->field('description', __('Description'));
        $show->field('opening_time', __('Opening time'));
        $show->field('closing_time', __('Closing time'));
        $show->field('lowest_price', __('Lowest price'));
        $show->field('highest_price', __('Highest price'));
        $show->field('post_code', __('Post code'));
        $show->field('address', __('Address'));
        $show->field('phone_number', __('Phone number'));
        $show->field('holiday', __('Holiday'));
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
        $form = new Form(new Store());

        $form->text('name', __('Name'));
        $form->text('category_id', __('Category id'));
        $form->image('img', __('Img'));
        $form->textarea('description', __('Description'));
        $form->time('opening_time', __('Opening time'))->default(date('H:i:s'));
        $form->time('closing_time', __('Closing time'))->default(date('H:i:s'));
        $form->number('lowest_price', __('Lowest price'));
        $form->number('highest_price', __('Highest price'));
        $form->text('post_code', __('Post code'));
        $form->text('address', __('Address'));
        $form->text('phone_number', __('Phone number'));
        $form->text('holiday', __('Holiday'));

        return $form;
    }
}
