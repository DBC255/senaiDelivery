<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produtos = [
            'Lanches' => [
                [
                    'nome' => 'X-Burguer',
                    'descricao' => 'pão, hamburguer, queijo e molho especial',
                    'preco' => 18.90,
                    'destaque' => true
                ],

                [
                    'nome' => 'X-Bacon',
                    'descricao' => 'pão, hamburguer, queijo, bacon e salada',
                    'preco' => 18.90,
                    'destaque' => true
                ],
            ],
            'Porcoes' => [
                [
                    'nome' => 'Batata Frita',
                    'descricao' => 'Porção de batatas fritas',
                    'preco' => 22.90,
                    'destaque' => false
                ],

                [
                    'nome' => 'Calabresa acebolada',
                    'descricao' => 'calabresa fatiada com cebola',
                    'preco' => 22.90,
                    'destaque' => true
                ]
            ],
            'Bebidas' => [
                [
                    'nome' => 'Refrigerante',
                    'descricao' => 'Refrigerante lata',
                    'preco' => 6.00,
                    'destaque' => false
                ],

                [
                    'nome' => 'Suco de laranja',
                    'descricao' => 'Suco natural de laranja',
                    'preco' => 10.00,
                    'destaque' => true
                ]
            ],
            'Sobremesas' => [
                [
                    'nome' => 'Pudin',
                    'descricao' => 'Fatia de pudin',
                    'preco' => 9.90,
                    'destaque' => false
                ],

                [
                    'nome' => 'Sorvete',
                    'descricao' => 'Sorvete com cobertura',
                    'preco' => 10.00,
                    'destaque' => true
                ]
            ]
        ];

        foreach ($produtos as $nomeCategoria => $itens) {
            $categoria = Categoria::where('nome', $nomeCategoria)->firstOrFail();

            foreach ($itens as $produto) {

                
                Produto::create(
                    [
                        'categoria_id' => $categoria->id,
                        'nome' => $produto['nome'],
                        'descricao' => $produto['descricao'],
                        'preco' => $produto['preco'],
                        'caminho_imagem' => null,
                        'ativo' => true,
                        'destaque' => $produto['destaque']
                    ]
                );
            };
        };
    }
}
