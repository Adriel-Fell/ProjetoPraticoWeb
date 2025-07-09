const tela = document.getElementById('temperatura');

async function buscaTemp() {
    try {
        const local = "Lajeado";
        const response = await fetch(`https://wttr.in/${local}?format=j1`);
        const data = await response.json();

        const temperatura = data.current_condition[0].temp_C;
        
        tela.textContent = `Temperatura em ${local}: ${temperatura}°C`;
    } catch (erro) {
        console.error("Erro ao buscar temperatura:", erro);
        tela.textContent = "Não foi possível obter a temperatura.";
    }
}

buscaTemp();