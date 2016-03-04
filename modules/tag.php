<?php
$tags = Tag::findAll();
?>

<title>Tags | Avíspate ONLINE!</title>

<br>

<div class="page-header">
	<h1>Tags</h1>
</div>

<div id="tag_list">
	<? foreach($tags as $tag): ?>
		<div class="col-sm-2 col-xs-6">
			<a href="/tag/<?=$tag['id']?>"><?=$tag["nombre"]?></a>
		</div>
	<? endforeach; ?>
</div>