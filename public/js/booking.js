let modal = document.getElementById("buy-modal");

window.onclick = (event) => {
    if(event.target === modal){
        modal.style.display = "none";
    }
}

let seats = document.getElementsByClassName('seat-chair not-booked');
let bookingSeat = document.getElementById("booking-seat");

seats[0].className = "seat-chair seat-active";
let seatSelectionNumber = seats[0].innerHTML;
bookingSeat.innerText = "Seat #" + seatSelectionNumber;

for (let i=0; i < seats.length; i++){
    seats[i].addEventListener("click", function () {
        let currentSeat = document.getElementsByClassName("seat-active");
        currentSeat[0].className = "seat-chair not-booked";
        this.className = "seat-chair seat-active";
        bookingSeat.innerText = "Seat #" + this.innerText;
        seatSelectionNumber = this.innerText;
    })
}

let buttonBuyTicket = document.getElementById("buy-btn");
buttonBuyTicket.onclick = () => {
    modal.style.display = "block";
    let currentURL = window.location.href;
    let lastURLSegment = currentURL.substr(currentURL.lastIndexOf('/') + 1);
    let xhr = new XMLHttpRequest();
    let targetUrl = URL_BASE_PUBLIC + 'booking/book/' + lastURLSegment + '/' + seatSelectionNumber;
    xhr.open("GET", targetUrl, true);
    xhr.send();
}
