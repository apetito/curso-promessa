<?php

function salvarContato(array $dados)
{
    if (
        isset($dados['nome']) &&
        isset($dados['email']) &&
        isset($dados['mensagem'])
    ) {
        $registro = sprintf(
            "[%s] Nome: %s | E-mail: %s | Mensagem: %s\n",
            date('Y-m-d H:i:s'),
            $dados['nome'],
            $dados['email'],
            $dados['mensagem']
        );
        file_put_contents(
            PUBLIC_PATH . '/files/contatos.txt', 
            $registro, 
            FILE_APPEND
        );
        return true;
    }
    return false;
}