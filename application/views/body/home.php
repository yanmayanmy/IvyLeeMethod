<?php //var_dump($link); ?>
<div class="container">
	<h1 class="mt-5 col-10 offset-1">Ivy Lee Planner</h1>

	<div class="calendar col-10 offset-1">
		<?= $this->calendar->generate($year, $month, $link); ?>
	</div>
</div>