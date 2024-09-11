document.getElementById('add-product').addEventListener('click', function() {
    document.querySelector('.add-edit-section').classList.remove('hidden');
});

document.getElementById('add-client').addEventListener('click', function() {
    document.querySelector('.add-edit-section').classList.remove('hidden');
});

document.getElementById('add-supplier').addEventListener('click', function() {
    document.querySelector('.add-edit-section').classList.remove('hidden');
});

document.getElementById('add-user').addEventListener('click', function() {
    document.querySelector('.add-edit-section').classList.remove('hidden');
});

document.getElementById('add-invoice').addEventListener('click', function() {
    document.querySelector('.add-edit-section').classList.remove('hidden');
});

document.getElementById('cancel-btn').addEventListener('click', function() {
    document.querySelector('.add-edit-section').classList.add('hidden');
});

document.getElementById('form-element').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Élément enregistré avec succès !');
    document.querySelector('.add-edit-section').classList.add('hidden');
});
