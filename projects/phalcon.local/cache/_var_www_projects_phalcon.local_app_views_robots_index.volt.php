<div class="page-header">
    <h1>Robots!</h1>
</div>

<p>See my robots!</p>
<ol>
<?php foreach ($robots as $rob) { ?>
        <li><?= $rob->name ?></li>
       <ul>
           <?php foreach ($rob->robotsParts as $robotPart) { ?>
               <li><?= $robotPart->parts->name ?>
                   <small>
                       <?= $robotPart->parts->comment ?>
                   </small>
               </li>
           <?php } ?>
       </ul>
<?php } ?>
</ol>