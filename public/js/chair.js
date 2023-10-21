const rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'];
const numberOfSeatsInRow = 9;
const seatPrice = 45000; // Giá tiền cho các hàng trừ hàng I
const seatPriceForRowI = 100000; // Giá tiền cho hàng I
const excludedSeatsInRowI = ['I1', 'I3', 'I5', 'I7', 'I9']; // Các ghế bạn muốn xóa

const seatingMap = document.getElementById('seating-map');
const selectedSeatsList = document.getElementById('selected-seat-list');
const totalPrice = document.getElementById('total-price');

const selectedSeatsArray = [];
let totalCost = 0;

for (let row of rows) {
    for (let i = 1; i <= numberOfSeatsInRow; i++) {
        const seatId = row + i;
        const isExcludedSeat = row === 'I' && excludedSeatsInRowI.includes(seatId); // Xác định xem ghế có phải là ghế bị loại bỏ hay không

        if (!isExcludedSeat) {
            const seat = document.createElement('div');
            seat.className = 'seat';
            seat.id = seatId;

            if (row === 'I') {
                seat.textContent = seatId + '\n' ;
            } else {
                seat.textContent = seatId + '\n';
            }

            seat.addEventListener('click', () => {
                if (seat.classList.contains('selected')) {
                    seat.classList.remove('selected');
                    selectedSeatsArray.splice(selectedSeatsArray.indexOf(seatId), 1);
                    totalCost -= (row === 'I' ? seatPriceForRowI : seatPrice);
                } else {
                    seat.classList.add('selected');
                    selectedSeatsArray.push(seatId);
                    totalCost += (row === 'I' ? seatPriceForRowI : seatPrice);
                }
                updateSelectedSeatsList();
                updateTotalPrice();
            });

            seatingMap.appendChild(seat);
        }
    }
}

function updateSelectedSeatsList() {
    selectedSeatsList.innerHTML = selectedSeatsArray.join(', ');
}

function updateTotalPrice() {
    totalPrice.textContent = totalCost;
}