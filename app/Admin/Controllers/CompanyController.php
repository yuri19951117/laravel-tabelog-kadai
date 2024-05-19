<?php

namespace App\Admin\Controllers;

use App\Models\Company;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CompanyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Company';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Company());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('representative', __('Representative'));
        $grid->column('Establishmentday', __('Establishmentday'));
        $grid->column('postcode', __('Postcode'));
        $grid->column('address', __('Address'));
        $grid->column('business', __('Business'));
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
        $show = new Show(Company::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('representative', __('Representative'));
        $show->field('Establishmentday', __('Establishmentday'));
        $show->field('postcode', __('Postcode'));
        $show->field('address', __('Address'));
        $show->field('business', __('Business'));
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
        $form = new Form(new Company());

        $form->text('name', __('Name'));
        $form->textarea('representative', __('Representative'));
        $form->textarea('Establishmentday', __('Establishmentday'));
        $form->textarea('postcode', __('Postcode'));
        $form->textarea('address', __('Address'));
        $form->textarea('business', __('Business'));

        return $form;
    }
}
