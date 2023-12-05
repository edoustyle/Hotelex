// Adiciona evento de clique aos botões de rádio
document.querySelectorAll('.radiex input[type="radio"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
        // Remove a classe de todos os rótulos
        document.querySelectorAll('.radiex label').forEach(function(label) {
            label.classList.remove('selected');
        });

        // Adiciona a classe ao rótulo do botão de rádio selecionado
        this.closest('label').classList.add('selected');
    });
});