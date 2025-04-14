function criptografar() {
    const alfabeto = "abcdefghijklmnopqrstuvwxyz"
    let mensagemfinal = ""
    let mensagem = document.getElementById("mensagem").value
    for(i = 0; i < mensagem.length ; i++)
    {
        if(alfabeto.indexOf(mensagem[i]) !== -1)
        {
            x = alfabeto.indexOf(mensagem[i])
            y = alfabeto[Math.abs((x + 3) % alfabeto.length)]
            mensagemfinal += y
        }
        else
        {
            mensagemfinal += mensagem[i]
        }
    }
    document.getElementById("mensagemfinal").innerHTML = mensagem + " = " + mensagemfinal
}
function descriptografar() {
    const alfabeto = "abcdefghijklmnopqrstuvwxyz"
    let mensagemfinal = ""
    let mensagem = document.getElementById("mensagem").value
    for(i = 0; i < mensagem.length ; i++)
    {
        if(alfabeto.indexOf(mensagem[i]) !== -1)
        {
            x = alfabeto.indexOf(mensagem[i])
            y = alfabeto[Math.abs((x - 3) % alfabeto.length)]
            mensagemfinal += y
        }
        else
        {
            mensagemfinal += mensagem[i]
        }
    }
    document.getElementById("mensagemfinal").innerHTML = mensagem + " = " + mensagemfinal
}