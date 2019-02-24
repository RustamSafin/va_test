<?php

/* @var $this yii\web\View */
/* @var $pages array */


use yii\helpers\Html;

$this->title = 'Pages';
?>
<ul>
    <?php foreach ($pages as $page) {
        echo '<li>'.  $page["name"] . '</li>';
}?>
</ul>
