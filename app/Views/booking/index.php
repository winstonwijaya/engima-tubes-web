<div id="main-content">

    <a href="<? echo URL_BASE_PUBLIC . 'detail/' . $this->data['bookInfo']['movie_id'];?>" class="previous">&#8249;</a>
    <div class="mov-schedule">
        <div id="movie-title"><? echo $this->data['bookInfo']['movie_title'];?></div>
        <div id="release-date"><? echo $this->data['bookInfo']['date'] . ' - ' . $this->data['bookInfo']['time'];?></div>
    </div>
    <hr>

    <div>

            <div class="flex-container">
                <? for($i = 1; $i <= 30; $i++) :?>
                    <?if ($this->data['seats'][$i]):?>
                        <button class="seat-chair booked" value="<? echo $i; ?>"> <? echo $i; ?> </button>
                    <? else: ?>
                        <button class="seat-chair not-booked" value="<? echo $i; ?>"> <? echo $i; ?> </button>
                    <? endif; ?>
                <? endfor; ?>
                <div class="screen">Screen</div>
            </div>



        <div class="confirmation">
            <div class="booking-top booking-summary">Booking Summary</div>
            <div class="booking-detail">
                    <div id="detail-title"><? echo $this->data['bookInfo']['movie_title'];?></div>
                    <div id="release-date"><? echo $this->data['bookInfo']['date'] . ' - ' . $this->data['bookInfo']['time'];?></div>
            </div>
            <div class="seat">
                <div id="booking-seat">Seat #3</div>
                <div id="price">Rp 45000</div>
            </div>

            <button id="buy-btn">Buy Ticket</button>


            <div id="buy-modal" class="modal">
                <div class="modal-content">
                    <div id="payment">Payment Success!</div>
                    <div id="thank-you">Thank you for purchasing! You can view your purchase now.</div>
                    <a href="<? echo URL_BASE_PUBLIC;?>transaction">
                        <button class = "button-transaction">Go to transaction history</button>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>