<?php //var_dump($link); ?>
<div class="container">
	<h1>Ivy Lee Planner</h1>
	<?= $this->calendar->generate($year, $month, $link); ?>
</div>