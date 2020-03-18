<div id="main-content">
    <h1>Hello, <?php echo $this->data['username']; ?></h1>
    <h3>Now Playing</h3>
    <div class="flex-container">
        <?php foreach ($this->data['movies'] as $movie): ?>
            <div>
                <a href="<? echo URL_BASE_PUBLIC . 'detail/' . $movie->id; ?>">
                    <img id="moviepic" src="<? echo $movie->poster; ?>" alt="<? echo $movie->title; ?>">
                </a>
                <p id="movie-title"><? echo $movie->title; ?></p>
                <div>
                    <img id="star" src="https://www.pinpng.com/pngs/m/1-18185_small-yellow-star-clipart-yellow-star-clipart-hd.png" alt="star">
                    <p><? echo $movie->rating; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>