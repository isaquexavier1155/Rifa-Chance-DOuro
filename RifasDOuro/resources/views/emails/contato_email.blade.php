
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- INÍCIO ENTRAR EM CONTATO VIA EMAIL -->
        <h2>Entre em Contato</h2>
        <form action="{{ route('contact.store') }}" method="post">
        @csrf
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="mensagem">Mensagem:</label>
            <textarea id="msg" name="msg" required></textarea>
            
            <button type="submit" name="enviar">Enviar</button>
        </form>
<!-- FIM ENTRAR EM CONTATO VIA EMAIL -->
    
</body>
</html>
