<div class="content">
	<div class="padding">
		<form method="post" action="<?php echo create_link('guestbook/add'); ?>">
			<label>
				Sender:<br />
				<input type="text" name="guestbook[sender]" />
			</label>
			<label>
				Message:<br />
				<textarea cols="20" name="guestbook[msg]"></textarea>
			</label>

			<input type="submit" class="btn btn-primary" />
		</form>

		<?php foreach($Guestbook as $i): ?>
		<div class="well">
			<strong><?php echo $i['sender']; ?></strong><br />
			<?php echo $i['msg']; ?>
		</div>
		<?php endforeach; ?>
	</div>
</div>