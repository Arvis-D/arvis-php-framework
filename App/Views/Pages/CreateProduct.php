<?php

namespace App\Views\Pages;

use App\Views\View;
use App\Utilities\SessionMessage;

class CreateProduct extends View
{
    private $csrf;
    private $formRowText;
    public $title = 'Create a product';

    public function __construct()
    {
        $this->parent = 'Layouts\Master';
        $this->extendAs = 'content';
        $this->csrf = self::get('Components\Csrf');
        $this->formRowText = self::get('Components\FormRowText');
    }

    protected function render()
    {
        ?>
        <nav>
        <div class="nav-items">
            <a class="nav-item" href="/">Products</a>
            <a class="nav-item active" href="/product/add">Add a product</a>
            <button form="create-product" class="btn" type="submit">Save</button>
        </div>
        </nav>

        <form method="post" class="form" id="create-product" action="/product/store">
            <?php 
            $this->csrf->show(); 
            $this->formRowText->set('sku', 'Product SKU:', true)->show();
            $this->formRowText->set('name', 'Product name:', true)->show(); 
            $this->formRowText->set('price', 'Product price:', true)->show();  
            ?>
            <input id="attributes" type="hidden" name="attributes">
        <div class="form-row">
            <div class="input">
                <select id="type" name="type" form="create-product" class="type-select">
                <option value="furniture">Furniture</option>
                <option value="cd">CD</option>
                <option value="book">Book</option>
                </select>
            </div>
            <label for="type">Product type:</label>
        </div>

        <div class="dynamic-part" id="dynamic-furniture">
            <?php  
            $this->formRowText->set('height', 'Height:', true)->show();
            $this->formRowText->set('width', 'Width:', true)->show(); 
            $this->formRowText->set('length', 'Length:', true)->show();  
            ?>
            <p class="type-description">Please provide measurements of furniture in millimeters.</p>
        </div>

        <div class="dynamic-part" id="dynamic-cd">
            <?php $this->formRowText->set('size', 'Size:', true)->show(); ?>
            <p class="type-description">Please provide the size of the cd in megabytes.</p>
        </div>

        <div class="dynamic-part" id="dynamic-book">
            <?php $this->formRowText->set('weight', 'Weight:', true)->show(); ?>
            <p class="type-description">Please provide the weight of the book in kilograms</p>
        </div>

        </form>
        <script>document.querySelector('.type-select').value = 
            '<?= SessionMessage::get('inputOld')['type'] ?? 'furniture' ?>'
        </script>
        <script src="/public/js/dynamicForm.js"></script>
        <?php
    }
}