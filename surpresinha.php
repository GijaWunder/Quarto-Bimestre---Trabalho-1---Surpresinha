<?php

//lottoland

//oq precisa: num minimo; num maximo; valores; universo (mega sena 1 a 60)

//faltando preços (parte do Christopher) -> VS Code dele não está funcionado
//faltando se digitar valor invalido para quantidade de jogos (parte da Giovana)

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
                    print("Você escolheu a \033[37;42mMega Sena.\033[0m\n\n");
                    megaSena();

                    break;

                case "2":
                    print("Você escolheu a \033[37;42mQuina.\033[0m\n\n");
                    quina();

                    break;

                case "3":
                    print("Você escolheu a \033[37;42mLotofácil.\033[0m\n\n");
                    lotofacil();

                    break;

                case "4":
                    print("Você escolheu a \033[37;42mLotomania.\033[0m\n\n");
                    lotomania();

                    break;

                case "0";
                    print("Você escolheu sair.\n\n");
                    $continuar = false;
                    break;

                default:

                    print("Opção inválida!\n\n");
                    break;

            }

        }while ($continuar == true);

    }

    menu();

    function megaSena(): void{

        $quantidadeJogos = readline("Quantos jogos deseja?\n");
        jogos($quantidadeJogos, 6, 20, 1, 60);

    }

    function quina(): void{

        $quantidadeJogos = readline("Quantos jogos deseja?\n");
        jogos($quantidadeJogos, 5, 15, 1, 80);

    }

    function lotofacil(): void{

        $quantidadeJogos = readline("Quantos jogos deseja?\n");
        jogos($quantidadeJogos, 15, 20, 1, 25);

    }

    function lotomania(){

        $quantidadeDezena = 50;
        print("Nesta loteria a quantidade de dezenas é fixa em 50 dezenas.\n");
        $quantidadeJogos = readline("Quantos jogos deseja?\n");
        jogosLotomania($quantidadeJogos, 50, 0, 99);
        
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
        
        print implode(" | ", $sorteados);

    }

    function minimoEmaximo($quantidadeDezena, $minimoDezena, $maximoDezena, $minimoUniverso, $maximoUniverso){

         if ($quantidadeDezena < $minimoDezena) {
           while ($quantidadeDezena < $minimoDezena) {
                $quantidadeDezena = (int) readline("Valor baixo! Digite novamente: \n\n");

            }
            sorteio($minimoUniverso, $maximoUniverso, $quantidadeDezena);

        }elseif ($quantidadeDezena > $maximoDezena) {
            while ($quantidadeDezena > $maximoDezena) {
                $quantidadeDezena = (int) readline("Valor alto! Digite novamente: \n\n");
                
            }
            sorteio($minimoUniverso, $maximoUniverso, $quantidadeDezena);

        }else{
            sorteio($minimoUniverso, $maximoUniverso, $quantidadeDezena);
        }
    }

    function jogos($quantidadeJogos, $minimoDezena, $maximoDezena, $minimoUniverso, $maximoUniverso){
        for ($i=0; $i < $quantidadeJogos; $i++) { 
            $quantidadeDezena = (int) readline('Quantas dezenas deseja para o jogo ' . $i + 1 . "? \n");
            minimoEmaximo($quantidadeDezena, $minimoDezena, $maximoDezena, $minimoUniverso, $maximoUniverso);
            print("\n\n");
        }
    }

    function jogosLotomania($quantidadeJogos, $quantidadeDezena, $minimoUniverso, $maximoUniverso){
        for ($i=0; $i < $quantidadeJogos; $i++) {
            print('Jogo ' . $i + 1 . ": \n");
            sorteio(0, 99, 50);
            print("\n\n");
        }
        
    }
