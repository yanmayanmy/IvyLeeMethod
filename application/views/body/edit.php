<div class="container">
    <h1><?= $month_name[$month-1] . ' ' .  $day ?></h1>

    <h2>To Do List</h2>
    <form action="<?= base_url('IvyLee_index/edit') ?>" class="" method="post">
        <?php for($i = 1; $i <= 6; $i++): ?>
        <label for="task<?= $i ?>" name="task<?= $i ?>" class="form-label">No.<?= $i ?></label>
        <input type="text" id="task<?= $i ?>" class="form-control">
        <?php endfor; ?>
        <input type="hidden" name>
    </form>
    
	<a href="<?= base_url() ?>">Back</a>
</div>