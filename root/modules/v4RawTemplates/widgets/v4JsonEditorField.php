<?php
/**
 * Created by PhpStorm.
 * User: brafreider
 * Date: 10.12.2018
 * Time: 13:21
 */
require_once('include/layout/forms/FormField.php');

class v4JsonEditorField extends FormField
{
    function renderHtml(HtmlFormGenerator $gen, $row_result, array $parents, array $context)
    {
        $type = $gen->perform;
        if ($type == 'edit')
            return $this->renderHtmlEdit($gen, $row_result, $parents, $context);
        return parent::renderHtml($gen, $row_result, $parents, $context);
    }

    function renderHtmlEdit(HtmlFormGenerator $gen, RowResult $row_result, array $parents, array $context)
    {
        $value = '<input type="hidden" name="' . $this->name . '" id="json_data" value="' . to_html($row_result->getField($this->name)) . '">';
        $value .= '<div id="jsoneditor" class="" style="height:600px;"></div>';


        $js = <<<EOT
  var container = document.getElementById('jsoneditor');
  
  options = {
    mode: 'code',
    modes: ['code', 'form', 'text', 'tree', 'view'], // allowed modes
    onError: function (err) {
      alert(err.toString());
    },
    onChange: function () {
      document.getElementById('json_data').value = JSON.stringify(editor.get());
    },
    indentation: 4,
    escapeUnicode: true    
  };
  var editor = new JSONEditor(container, options, JSON.parse(document.getElementById('json_data').value));

EOT;


        $layout = $gen->getLayout();
        // $layout->addJSLanguage('Emails');
        $layout->addScriptInclude('modules/v4RawTemplates/js/jsoneditor.js');
        $layout->addCSSInclude('modules/v4RawTemplates/js/jsoneditor.css');
        $layout->addScriptLiteral($js);

        return $value;
    }
}
