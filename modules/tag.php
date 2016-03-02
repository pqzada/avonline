<?php
$tags = Tag::findAll();
?>
<br>

<div class="page-header">
	<h1>Tags</h1>
</div>

<div id="tag_list">
	<? foreach($tags as $tag): ?>
		<div class="col-md-2 col-xs-6">
			<a href="/tag/<?=$tag['id']?>"><?=$tag["nombre"]?></a>
		</div>
	<? endforeach; ?>
</div>