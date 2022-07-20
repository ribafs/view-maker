<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ViewMakerCommand extends Command
{
    protected $signature = 'view:maker';
    protected $description = 'Criação das views básicas: create, edit, index e show. Somente dois campos';

    public function handle()
    {
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    system('cls');
} else {
    system('clear');
}

        $folders = $this->ask('Nome da tabela? Tudo em minúsculas e no plural.');
        $this->info('');

        $folder = Str::singular($folders);
        $folderend = resource_path('views/'.$folders.'/');

        $field0 = $this->ask("Nome do primeiro campo");
        $field1 = $this->ask("Nome do segundo campo");

        if(!file_exists($folderend)){
            mkdir($folderend,0755,true);
        }else{
            $this->info('======O diretório '.$folders. ' já existe! Nenhuma view criada!========');
        }

//        File::copy(app_path('Console/Commands/views/create.php'), $folderend.'create.blade.php'));

        require_once app_path('Console/Commands/views.php');

        // File::put($pasta, $conteudo);
        File::put($folderend.'create.blade.php',$create);
        File::put($folderend.'edit.blade.php',$edit);
        File::put($folderend.'form.blade.php',$form);
        File::put($folderend.'index.blade.php',$index);
        File::put($folderend.'show.blade.php',$show);

        $this->info(PHP_EOL);
        $this->info('Views criadas em.'.$folderend.PHP_EOL);
    }
}
