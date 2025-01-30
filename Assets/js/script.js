const startDate = new Date('2024-02-05T15:00:00'); // Data de início do namoro

function updateTime() {
    const now = new Date();
    const timeDifference = now - startDate; // Diferença em milissegundos

    const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

    // Atualizar o contador de tempo
    document.getElementById("contador").innerText = `Contagem: ${days} dias, ${hours} horas, ${minutes} minutos, ${seconds} segundos`;
}

setInterval(updateTime, 1000); // Atualiza a cada segundo
