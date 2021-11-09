const dragAndDrop = () => {
    const cards = document.querySelectorAll('.js-card');
    const cells = document.querySelectorAll('.js-cell');

    const dragStart = function () {
        setTimeout(() => {
            this.classList.add('hide')
        }, 100)
    }
    const dragEnd = function () {
        this.classList.remove('hide');
    }
    const dragOver = function () {

    }
    const dragEnter = function () {

    }
    const dragLeave = function () {

    }
    const dragDrop = function () {

    }

    cells.forEach((cell) => {
        cell.addEventListener('dragover', dragOver);
        cell.addEventListener('dragenter', dragEnter);
        cell.addEventListener('dragleave', dragLeave);
        cell.addEventListener('drop', dragDrop);
    })

    for (let i = 0; i < cards.length; i++) {
        const card = cards[i];
        card.addEventListener('dragstart', dragStart);
        card.addEventListener('dragend', dragEnd);
    }
}

dragAndDrop()