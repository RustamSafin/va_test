<?php

/* @var $this yii\web\View */
/* @var $shuffle boolean */


$this->title = 'My Yii Application';
?>
<h4>
    <?php if ($shuffle && isset($shuffle)) { echo 'shuffled';} else {  echo 'something went wrong';}?>
</h4>