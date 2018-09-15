<?php

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field;

class Simditor extends Field
{
    public static $js = [
        //'/packages/simditor/site/assets/scripts/jquery.min.js',
        '/packages/simditor/site/assets/scripts/module.js',
        '/packages/simditor/site/assets/scripts/hotkeys.js',
        '/packages/simditor/site/assets/scripts/uploader.js',
        '/packages/simditor/site/assets/scripts/simditor.js',
    ];
    public static $css = [
        '/packages/simditor/styles/simditor.css',
    ];

    protected $view = 'admin.simditor';

    public function render()
    {
        //$this->script = "$('textarea.{$this->getElementClassString()}').ckeditor();";
        $name = $this->formatName($this->column);
        //$url = route('uploadImg');

        $this->script = <<<EOT
$(document).ready(function(){

      var editor = new Simditor({
          textarea: $('#editor'),
          toolbar: [
            'title',
            'bold',
            'italic',
            'underline',
            'strikethrough',
            'fontScale',
            'color',
            '|',
            'ol',
            'ul',
            'blockquote',
            'code',
            'table',
            '|',
            'link',
            'image',
            'hr',
            '|',
            'indent',
            'outdent',
            'alignment'
        ],
          upload: true
      });
 });
EOT;

        return parent::render();
    }
}