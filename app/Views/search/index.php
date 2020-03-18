<div id="main-content">
    <h1>
        Showing search result for keyword <?= $this->data['pageTitle']?>
    </h1>
    <h2>
        <?php echo count($this->data['movies']) ?> Results available
    </h2>

    <?php foreach($this->data['movies'] as $movie): ?>
        <div id="movie">
            <img id="moviepic" src=<?php echo $movie->poster ?> >
            <div id="movietext" class="container">
                <div>
                    <h3 id="movietitle"><?php echo $movie->title ?></h3>
                    <div>
                        <span id="star">&bigstar;</span>
                        <span><?= $movie->rating ?></span>
                    </div>
                    <div id="moviedesc" class="container">
                        <p><?php echo $movie->plot ?></p>
                    </div>
                </div>
                <a href="<?= URL_BASE_PUBLIC . "detail/" . $movie->id; ?>"><div id="viewdetails">View details</div></a>
            </div>
            <hr noshade>
        </div>
    <?php endforeach; ?>

    <?php $totalPage = ceil($this->data['totalMovies']/6) ?>
    <?php for($i=1; $i <= $totalPage; $i++) : ?>
        <a href="<?= URL_BASE_PUBLIC; ?>search/<?= $i ?>" method><?= $i; ?> </a>
    <?php endfor; ?>

</div>