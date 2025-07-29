document.addEventListener('DOMContentLoaded', () => {
  const input = document.getElementById('search');
  const resultsContainer = document.querySelector('.card-list');

  function buscarPokemons(query = '') {
    fetch(`buscar.php?q=${encodeURIComponent(query)}`)
      .then(res => res.text())
      .then(html => {
        resultsContainer.innerHTML = html;
      });
  }

  // Buscar todos ao carregar a página
  buscarPokemons();

  // Filtrar conforme digita
  input.addEventListener('input', () => {
    const query = input.value.trim();
    buscarPokemons(query);
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const input = document.getElementById('search');
  const resultsContainer = document.querySelector('.card-list');

  function buscarPokemons(query = '') {
    fetch(`buscar.php?q=${encodeURIComponent(query)}`)
      .then(res => res.text())
      .then(html => {
        resultsContainer.innerHTML = html;
        adicionarEventosEdicao(); // Reatribuir eventos
      });
  }

  function adicionarEventosEdicao() {
    document.querySelectorAll('.btn-editar').forEach(button => {
      button.addEventListener('click', () => {
        document.getElementById('edit-id').value = button.dataset.id;
        document.getElementById('edit-nome').value = button.dataset.nome;
        document.getElementById('edit-tipo').value = button.dataset.tipo;
        document.getElementById('edit-vida').value = button.dataset.vida;
        document.getElementById('edit-ataque').value = button.dataset.ataque;
        document.getElementById('edit-defesa').value = button.dataset.defesa;
        document.getElementById('modal-editar').classList.remove('hidden');
      });
    });
  }

  document.getElementById('form-editar').addEventListener('submit', e => {
    e.preventDefault();

    const formData = new FormData(e.target);

    fetch('editar.php', {
      method: 'POST',
      body: formData
    }).then(res => res.text())
      .then(res => {
        alert('Pokémon atualizado com sucesso!');
        document.getElementById('modal-editar').classList.add('hidden');
        buscarPokemons(input.value.trim()); // Atualizar lista
      });
  });

  document.getElementById('cancelar').addEventListener('click', () => {
    document.getElementById('modal-editar').classList.add('hidden');
  });

  buscarPokemons();

  input.addEventListener('input', () => {
    buscarPokemons(input.value.trim());
  });
});



