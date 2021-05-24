const contentWrapper = document.querySelector('.content__wrapper');

let data = [];

if (!data.length){
    getData();
}

function render (data) {
    contentWrapper.innerHTML = '';

    data.forEach(elem => {
        const item = document.createElement('div');
        item.classList.add('content__item');
        item.innerHTML = `
            <div class="content__image">
                <img src="${elem.image}" alt="">
            </div>
            <h3 class="content__title">${elem.name}</h3>
            <p class="content__description">${elem.description}</p>
            <div class="content__price">${elem.price}</div>
        `;

        contentWrapper.insertAdjacentElement('beforeend', item);
    })
}

async function getData(){
    data = await fetch('./content.php').then(response => response.json());
    render(data);
}


function byField(field) {
    return (a, b) => a[field] < b[field] ? 1 : -1;
};


document.querySelector('.show').addEventListener('click', () => {
    const baseByPrice = data.sort(byField('price'));
    render(baseByPrice);
})