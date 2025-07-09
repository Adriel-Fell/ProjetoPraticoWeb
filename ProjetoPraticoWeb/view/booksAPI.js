const tabela = document.getElementById('bookList').querySelector('tbody');
const requestInput = document.getElementById('pedido');
const tituloInput = document.getElementById('titulo');
const temaInput = document.getElementById('tema');
const autorInput = document.getElementById('autor');

async function findBooks() {
    tabela.innerHTML = '';
    const query = requestInput.value.trim() || 'tecnologia';
    const response = await fetch(
    `https://www.googleapis.com/books/v1/volumes?q=${encodeURIComponent(query)}`
    );
    const data = await response.json();
    const items = data.items || [];
    items.forEach(item => {
    const info = item.volumeInfo;
    const title = info.title || 'Não disponível';
    const categories = (info.categories || ['Não disponível']).join(', ');
    const authors = (info.authors || ['Não disponível']).join(', ');

    const tr = document.createElement('tr');
    const tdTitle = document.createElement('td');
    tdTitle.textContent = title;
    tr.appendChild(tdTitle);

    const tdCategory = document.createElement('td');
    tdCategory.textContent = categories;
    tr.appendChild(tdCategory);

    const tdAuthor = document.createElement('td');
    tdAuthor.textContent = authors;
    tr.appendChild(tdAuthor);

    const tdActions = document.createElement('td');
    const botao = document.createElement('button');
    botao.textContent = 'Copiar';
    botao.addEventListener('click', () => {
        preencheCampos(title, categories, authors);
    });
    tdActions.appendChild(botao);
    tr.appendChild(tdActions);

    tabela.appendChild(tr);
    });
}

function preencheCampos(title, categories, authors) {
    tituloInput.value = title;
    temaInput.value = categories;
    autorInput.value = authors;
}