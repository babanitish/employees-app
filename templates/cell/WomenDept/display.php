<p>Les 3 départements présentant le plus de femmes</p>
<p>
<?php foreach($mostWomen as $dept):?>
    <?= "$dept->deptName : $dept->nbWomen <br/>" ?>
<?php endforeach; ?>
</p>

<p>Les 3 départements présentant le moins de femmes</p>
<p>
<?php foreach($leastWomen as $dept):?>
    <?= "$dept->deptName : $dept->nbWomen <br/>" ?>
<?php endforeach; ?>
</p>