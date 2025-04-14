def pegarletras():
    
    lista = []
    
    for i in range(ord("a"), ord("z") + 1):
        letra = chr(i)
        lista.append(letra)
        
    return lista

def valida_chave(chave):
    
    if chave.isnumeric() and 0 < int(chave) < 26:         
        return True
    return False
def criptografar(texto, chave = 3):
    if not valida_chave(chave):
        return "Chave inválida"
    
    chave = int(chave)
    texto = texto.lower()
    lista = pegarletras()
    novo_texto = ""

    for letra in texto:
        if letra in lista:
            posicao = lista.index(letra)
            posicao += chave
            novaletra = lista[posicao % len(lista)]
            novo_texto += novaletra
        else:
            novo_texto += letra
    return novo_texto
    
def descriptografar (texto, chave =3):
    if not valida_chave(chave):
            return "Chave inválida"
    chave = int(chave)
    texto = texto.lower()
    lista = pegarletras()
    novo_texto = ""
        
    for letra in texto:
        if letra in lista:
            posicao = lista.index(letra)
            posicao -= chave
            novaletra = lista[posicao % len(lista)]
            novo_texto += novaletra
    else:
        novo_texto += letra
    return novo_texto

while True:
    print("\n--- Criptografia e Decriptografia ---")
    texto = input("Digite o texto: ")
    chave = input("Chave: ")
    modo = input("\n Selecione 1 para criptografar\n Selecione 2 para descriptografar \n Selecione: ")
    if modo == "1":
        texto = criptografar(texto, chave)
        print("Texto criptografado: ", texto)
    elif modo == "2":
        texto = descriptografar(texto, chave)
        print("Texto descriptografado: ", texto)
    else:
        print("Modo inválido!")