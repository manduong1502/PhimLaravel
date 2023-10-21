
  const decreaseButton = document.querySelector('.decrease');
  const increaseButton = document.querySelector('.increase');
  const countInput = document.querySelector('.count');

  decreaseButton.addEventListener('click', () => {
    let count = parseInt(countInput.value);
    if (count >= 1) {
      count--;
      countInput.value = count;
    }
  });

  increaseButton.addEventListener('click', () => {
    let count = parseInt(countInput.value);
    count++;
    countInput.value = count;
  });
