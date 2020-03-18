<div id="main-content">

    <img id="moviepic" src="<? echo $this->data['movieInfo']->poster;?>" alt="spider">
    <div class="movdetail-container">
        <div>
            <div id="movie-title"><? echo $this->data['movieInfo']->title;?></div>
            <div id="moviegenre-duration"><? echo $this->data['movieInfo']->genres . ' | ' . $this->data['movieInfo']->duration . ' minutes';?></div>
            <div id="release-date"><? echo 'Released date : ' . $this->data['movieInfo']->released_date;?></div>
            <div>
                <p>&#x2B50; <? echo $this->data['movieInfo']->rating;?> / 10</p>
            </div>
            <div id="movdetail"><? echo $this->data['movieInfo']->plot;?></div>
        </div>
    </div>

    <div class="schedule-review">
        <div class="schedule-container">
            <div>
                <cont-title>Schedule</cont-title>
                <table>
                    <tr>
                        <th><non-seat>Date</non-seat></th>
                        <th><non-seat>Time</non-seat></th>
                        <th><non-seat>Available Seats</non-seat></th>
                        <th><non-seat></non-seat></th>
                    </tr>
                    <? foreach ($this->data['schedules'] as $schedule): ?>
                    <tr>
                        <th><non-seat><? echo $schedule->date; ?></non-seat></th>
                        <th><non-seat><? echo $schedule->time; ?></non-seat></th>
                        <th><seat><? echo $schedule->available_seats; ?></seat></th>
                        <? if ($schedule->is_available): ?>
                            <th><book>Book Now <a href="<? echo URL_BASE_PUBLIC . 'booking/index/' . $schedule->id;?>" class="next">&#8250;</a></book></th>
                        <? else:?>
                            <th><notava>Not Available <b>x</b></notava></th>
                        <? endif; ?>
                    </tr>
                    <? endforeach;?>
                </table>
            </div>
        </div>

        <div class="review-container">
            <table>
                <cont-title>Reviews</cont-title>
                <? foreach ($this->data['reviews'] as $review): ?>
                    <tr>
                        <th>
                            <div id="review">
                                <img id="profpic" src="<? echo $review->profile_pic;?>" alt="unknown">
                                <div class="rev-container">
                                    <non-seat><? echo $review->username; ?></non-seat>
                                    &#x2B50; <? echo $review->rating; ?> / 10
                                    <rev><? echo $review->comment; ?></rev>
                                </div>
                            </div>
                        </th>
                    </tr>
                <? endforeach; ?>

            </table>
        </div>
    </div>
</div>