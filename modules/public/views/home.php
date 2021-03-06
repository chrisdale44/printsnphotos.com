<!-- artist navigation bar -->
<nav class="filterNav">
	<a href="javascript:void(0);" class="mobile-menu">
		Filter Results
	</a>
	<ul>
		<li class="hr">
			<a href="javascript:void(0);" data-filter="*" class="selected">
				View All
			</a>
		</li>
		<li>
			<a href="javascript:void(0);" data-filter=".print">
				Prints
			</a>
		</li>
		<li class="hr">
			<a href="javascript:void(0);" data-filter=".photo">
				Photos
			</a>
		</li>
		<? if (mysqli_num_rows($data['artists'])) :
			while ($row = mysqli_fetch_array($data['artists'])) : ?>
		<li>
			<a href="javascript:void(0);" data-filter=".<?= $row['artistId'] ?>">
				<?= $row["forename"] ?> <?= $row["surname"] ?>
			</a>
		</li>
		<? endwhile;
		endif; ?>
		<li class="hr-top">
			<a href="javascript:void(0);" data-filter=".about" class="about">
				About
			</a>
		</li>
	</ul>
	<div class="hr"></div>
</nav>

<!-- artist biography paragraphs -->
<div class="biographies">
	<? 	mysqli_data_seek($data['artists'],0);
		if (mysqli_num_rows($data['artists'])) :
			while ($row = mysqli_fetch_array($data['artists'])) : ?>
		<div class="isotopeItem bio <?= $row['artistId'] ?>">
			<h2><?= $row['forename'] ?> <?= $row['surname'] ?></h2>
			<?= $row['bio'] ?>
		</div>
	<? endwhile;
	endif; ?>
	<div class="isotopeItem about about-para">
		<h2>About</h2>
		<p><?= $data['about']['about']; ?></p>
	</div>
</div>

<!-- image grid of artwork -->
<div class="img-grid-container">
	<? if (mysqli_num_rows($data['artwork'])) : 
		while ($row = mysqli_fetch_array($data['artwork'])) : ?>
		
		<div class="isotopeItem tile <?= $row['artistId'] ?> <?= $row['medium'] ?> animated">
			<a href="/images/artwork/<?= $row['image'] ?>" class="img-container" data-rel="lightcase">
				<img src="/images/artwork/<?= $row['image'] ?>"
					alt="<?= $row["title"] ?> by <?= $row["forename"] ?> <?= $row["surname"] ?>" />
				<span class="title hidden"><?= $row['title'] ?></span>
				<span class="artist hidden"><?= $row['forename'] ?> <?= $row["surname"] ?></span>
				<span class="year hidden"><?= $row['year'] ?></span>
				<span class="desc hidden"><?= nl2br($row['description']) ?></span>
			</a>
			<div class="art-info">
				<a href="javascript:void(0);" class="artist" data-filter=".<?= $row['artistId'] ?>"><?= $row["forename"] ?> <?= $row["surname"] ?></a>
				<span class="title"><?= $row["title"] ?></span>
			</div>
		</div>
	<? endwhile; 
	endif; ?>
</div>

