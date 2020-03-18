<div id="main-content">
    <h1>Transaction History</h1>

    <? foreach ($this->data['transactions'] as $transaction): ?>
        <div id="movie">
            <img id="moviepic" src="/tugas-besar-1-2019/public/img/movie/movie-<?php echo $transaction->movie_id;?>.jpg">
            <div id="movietext">
                <div>
                    <h2 id="movie-title"><?php echo $transaction->title; ?></h2>
                    <div id="moviedesc">
                        <span id="schedule">
                            <span style="color: rgb(0, 178, 190)">Schedule: </span>
                            <span><?php echo $transaction->date_time; ?></span>
                        </span>
                    </div>
                </div>
                <?php if($transaction->is_can_review): ?>
                    <?php if($transaction->is_review_exists): ?>
                        <span>
                        <a href= "<? echo URL_BASE_PUBLIC . "review/" . $transaction->id; ?>"><div class="button" id="editreview">Edit Review</div></a>
                        </span>
                        <span>
                            <a href= "<? echo URL_BASE_PUBLIC . "transaction/deleteReview/" . $transaction->id;?>"><div class="button" id="deletereview">Delete Review</div></a>
                        </span>
                    <?php else: ?>
                        <a href= "<? echo URL_BASE_PUBLIC . "review/" . $transaction->id; ?>"><div class="button" id="addreview">Add Review</div></a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    <?endforeach;?>
</div>