<div class="row">
	<div class="my-4">
		<a href="/site/creatediary">
			<button type="submit" class="btn btn-primary">Создать блог</button>
		</a>
	</div>
</div>
<div class="row">
	<div class="d-flex flex-column justify-content-start dashboard">
		<?php
		$this->widget("ext.widgets.dashboardwidget.dashboardwidget", compact("d"));
		?>
	</div>
</div>
<div class="row mt-4">
	<nav aria-label="...">
		<ul class="pagination d-flex justify-content-end pagination-sm">
			<? for ($i = 1; $i <= $pages; $i++): ?>
				<? if ($i == $page): ?>
					<li class="page-item active" aria-current="page">
						<span class="page-link">
							<?= $page ?>
						</span>
					</li>
				<? else: ?>
					<li class="page-item"><a class="page-link" href="/site/index/?page=<?= $i ?>"><?= $i ?></a></li>
				<? endif; ?>
			<? endfor; ?>
		</ul>
	</nav>
</div>