<?php

namespace App\Controllers;

use Config\Database;

class BackupController extends BaseController
{


    public function baixar()
    {
        $dbConfig = config(Database::class)->default;

        $host    = $dbConfig['hostname'];
        $usuario = $dbConfig['username'];
        $senha   = $dbConfig['password'];
        $banco   = $dbConfig['database'];

        // Aponta para a pasta "backup" na raiz do projeto (ex: C:\laragon\www\excursao-fia\backup\)
        $pastaDestino = ROOTPATH . 'backup' . DIRECTORY_SEPARATOR;
        if (!is_dir($pastaDestino)) {
            mkdir($pastaDestino, 0777, true);
        }

        // Cria um .htaccess dentro da pasta backup para impedir acesso via navegador por segurança
        $arquivoHtaccess = $pastaDestino . '.htaccess';
        if (!file_exists($arquivoHtaccess)) {
            file_put_contents($arquivoHtaccess, "Deny from all\n");
        }

        $nomeArquivo     = 'backup_' . $banco . '_' . date('Y-m-d_H-i-s') . '.sql';
        $caminhoCompleto = $pastaDestino . $nomeArquivo;

        $arquivosLaragon = glob('C:\\laragon\\bin\\mysql\\*\\bin\\mysqldump.exe');
        $mysqldump = !empty($arquivosLaragon) ? $arquivosLaragon[0] : 'mysqldump';

        $args = [
            escapeshellarg($mysqldump),
            '--host=' . escapeshellarg($host),
            '--user=' . escapeshellarg($usuario),
        ];

        if (!empty($senha)) {
            $args[] = '--password=' . escapeshellarg($senha);
        }

        $args[] = '--result-file=' . escapeshellarg($caminhoCompleto);
        $args[] = escapeshellarg($banco);

        $comando = implode(' ', $args) . ' 2>&1';

        exec($comando, $saida, $status);

        if ($status === 0 && file_exists($caminhoCompleto) && filesize($caminhoCompleto) > 0) {
            // Redireciona de volta com aviso de sucesso (o arquivo fica salvo na pasta /backup)
            return redirect()->back()->with('sucesso', 'Backup salvo com sucesso na pasta backup: ' . $nomeArquivo);
        }

        return redirect()->back()->with('erro', 'Não foi possível gerar o backup do banco de dados.');
    }
}
