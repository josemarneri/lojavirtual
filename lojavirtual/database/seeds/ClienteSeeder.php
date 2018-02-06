<?php

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
        $cliente = new Cliente();
        if (count($cliente->all())<1){
            $clientes[] = ['id'=> null, 'nome'=>'Idea Brasil ', 'sigla'=>'IdBR'];
            $clientes[] = ['id'=> null, 'nome'=>'Idea Itália ', 'sigla'=>'IdIT'];
            $clientes[] = ['id'=> null, 'nome'=>'FCA Group S/A', 'sigla'=>'FCA'];
            $clientes[] = ['id'=> null, 'nome'=>'Renault S/A', 'sigla'=>'RNT'];
            
            foreach($clientes as $c){
                $cliente->create($c);
            }
        }
    }
}
