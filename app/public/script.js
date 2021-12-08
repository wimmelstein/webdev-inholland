function addItem() {

    const textarea = document.getElementById('todoText');

    const container = document.getElementById('itemList');

    const newId = `card-${ container.children.length + 1}`;
    const card = document.createElement('div');
    card.className = 'col-md-6 col-xxl-4 p-1';
    card.setAttribute('id', newId);

    const cardElement = document.createElement('div');
    cardElement.className = 'card';

    const cardBody = document.createElement('div');
    cardBody.className = 'card-body';

    const cardText = document.createElement('p');
    cardText.innerHTML = textarea.value;

    cardBody.appendChild(cardText);
    cardElement.appendChild(cardBody);
    card.appendChild(cardElement);

    const cardFooter = document.createElement('div');
    cardFooter.className = 'card-footer';
    const button = document.createElement('button');
    button.className = 'btn btn-outline-primary';
    button.setAttribute('onClick', `removeItem(${newId})`);


    cardFooter.appendChild(button);
    card.appendChild(cardFooter);

    container.appendChild(card);

    textarea.value = '';

}

function removeItem(cardId) {
    const row = document.getElementById('itemList').children;
    row.namedItem(cardId).remove();

}