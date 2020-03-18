<div id="reviewpage">
            <span>
                <button id="backbutton">&lt;</button>
            </span>
    <span id="movietitle"><? echo $this->data['movie']->title; ?></span>
    <form
            action="<? echo URL_BASE_PUBLIC . 'review/insertNewComment/' . $this->data['transactionID'] . '/' . $this->data['movie']->id; ?>"
            method="post"
            id="form-review">
        <div id="review" class="container">
            <div id="reviewmethod">
                <h1>Add Rating</h1>
                <h1>Add Review</h1>
            </div>
            <div id="userinput" class="container">
                <div class="rate">
                    <input type="radio" id="star10" name="rating" value="10" />
                    <label for="star10" title="text">10 stars</label>
                    <input type="radio" id="star9" name="rating" value="9" />
                    <label for="star9" title="text">9 stars</label>
                    <input type="radio" id="star8" name="rating" value="8" />
                    <label for="star8" title="text">8 stars</label>
                    <input type="radio" id="star7" name="rating" value="7" />
                    <label for="star7" title="text">7 stars</label>
                    <input type="radio" id="star6" name="rating" value="6" />
                    <label for="star6" title="text">6 star</label>
                    <input type="radio" id="star5" name="rating" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rating" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rating" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rating" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rating" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>
                <br>
                <label for="reviewinput"></label>
                <textarea id="reviewinput" name="comment"></textarea>

                <button
                        type="submit"
                        id="submit"
                        form="form-review"
                        onclick="location.href = <? echo URL_BASE_PUBLIC . 'transaction/'; ?>">
                    Submit
                </button>
                <button id="cancel">Cancel</button>
            </div>
        </div>
    </form>
</div>