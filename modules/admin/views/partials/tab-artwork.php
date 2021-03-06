<a href="index.php?admin&amp;p=artwork" class="button darkGrey">Add new artwork</a>

<table class="admin-table">
	<tr>
		<th>
			Artist
		</th>
		<th>
			Image
		</th>
		<th>
			Title
		</th>
		<th>
			Year
		</th>
		<th> 
			Medium
		</th>
		<th>
			Description
		</th>
		<th>
			Live
		</th>
		<th>
			Edit
		</th>
		<th>
			Delete
		</th>
	</tr>
<? while($row = mysqli_fetch_array($data['artwork'])): ?>
	<tr>
		<td>
			<?= $row['forename'] ?> <?= $row['surname'] ?>
		</td>
		<td>
			<img src="/images/artwork/<?= $row['image'] ?>" alt="<?= $row['title'] ?> by <?= $row['forename'] ?> <?= $row['surname'] ?>" class="artwork-small" />
		</td>
		<td>
			<?= $row['title'] ?>
		</td>
		<td>
			<?= $row['year'] ?>
		</td>
		<td>
			<?= $row['medium'] ?>
		</td>
		<td>
			<?= nl2br($row['description']) ?>
		</td>
		<td>
			<a href="index.php?admin&amp;p=dash&amp;method=toggle&amp;id=<?= $row['artId'] ?>&amp;bool=<?= $row['live'] ?>"><?= $data['bool'][$row['live']] ?></a>
		</td>
		<td>
			<a href="index.php?admin&amp;p=artwork&amp;id=<?= $row['artId'] ?>">Edit</a>
		</td>
		<td>
			<a href="index.php?admin&amp;p=dash&amp;method=delart&amp;id=<?= $row['artId'] ?>">Delete</a>
		</td>
	</tr>
<? endwhile; ?>
</table>