<p>
<?php foreach($deptNameMoreWo as $deptName):?>
    <?= $deptName ?>
<?php endforeach; ?>
</p>
<p>
<?php foreach($nbWomenDept as $nbWomen):?>
    <?= $nbWomen ?>
<?php endforeach; ?>
</p>
<p>Les 3 départements présentant le plus de femmes</p>
<?php foreach($deptNameLessWo as $nbDeptLessW):?>
    <?= $nbDeptLessW ?>
<?php endforeach; ?>
<?php foreach($nbDeptLessWo as $DeptLessW):?>
    <?= $DeptLessW ?>
<?php endforeach; ?>