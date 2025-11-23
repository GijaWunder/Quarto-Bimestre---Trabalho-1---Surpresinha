<?php

//lottoland

//oq precisa: num minimo; num maximo; valores; universo (mega sena 1 a 60)

    function menu(): void{

        $continuar = true;

        do{

            print("\033[37;44mEscolha uma loteria:\033[0m\n");
            print("0- Sair\n");
            print("1- Mega Sena\n");
            print("2- Quina\n");
            print("3- Lotofácil\n");
            print("4- Lotomania\n");

            $opcao = trim(readline());

            switch($opcao){
                case "1":
                    print("Você escolheu a \033[37;42mMega Sena.\033[0m\n");
                    megaSena();

                    break;

                case "2":
                    print("Você escolheu a \033[37;42mQuina.\033[0m\n");
                    //quina();

                    break;

                case "3":
                    print("Você escolheu a \033[37;42mLotofácil.\033[0m\n");
                    //lotofacil();

                    break;

                case "4":
                    print("Você escolheu a \033[37;42mLotomania.\033[0m\n");
                    //lotomania();

                    break;

                case "0";
                    print("Você escolheu sair.\n");
                    $continuar = false;
                    break;

                default:

                    print("Opção inválida!\n");
                    break;

            }

        }while ($continuar == true);

    }

    //menu();
    megaSena();

    function megaSena(): void{

        //$quantidadeJogos = readline("Quantos jogos deseja?\n");
        $quantidadeDezena = readline("Quantas dezenas para cada jogo?\n");
        minimoEmaximo($quantidadeDezena, 6, 20, 1, 60);

    }

    function sorteio($minimo, $maximo, $quantidadeDezena){

        $sorteados = [];

        while(count($sorteados) < $quantidadeDezena){
            $dezenaSorteada = rand($minimo, $maximo);

            if(!in_array($dezenaSorteada, $sorteados)){
                $sorteados[] = $dezenaSorteada;
            }

        }

        sort($sorteados);
        
        print implode(", ", $sorteados);

    }

    function minimoEmaximo($quantidadeDezena, $minimoDezena, $maximoDezena, $minimoUniverso, $maximoUniverso){

         if ($quantidadeDezena < $minimoDezena) {
           while ($quantidadeDezena < $minimoDezena) {
                $quantidadeDezena = (int) readline("Valor baixo! Digite novamente: \n");

            }
            sorteio($minimoUniverso, $maximoUniverso, $quantidadeDezena);

        }elseif ($quantidadeDezena > $maximoDezena) {
            while ($quantidadeDezena > $maximoDezena) {
                $quantidadeDezena = (int) readline("Valor alto! Digite novamente: \n");
                
            }
            sorteio($minimoUniverso, $maximoUniverso, $quantidadeDezena);

        }else{
            sorteio($minimoUniverso, $maximoUniverso, $quantidadeDezena);
        }
    }
