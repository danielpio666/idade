<?php

/**
 * Nuvem de tags, com ordenação aleatória.
 *
 * @author Alfred Reinold Baudisch
 * @link http://www.auriumsoft.com.br/desenvolvedorphp
 */
class NuvemTags
{
    var $listaPalavras = array();

    /**
     * @param array|string $palavras
     */
    function NuvemTags($palavras = false)
    {
        $this->addPalavra($palavras);
    }

    /**
     * Adiciona palavras. Cada palavra adiciona recebe um ponto
     * (ou ponto de aparição)
     * @param array|string $palavras
     */
    function addPalavra($palavras)
    {
        if(is_array($palavras))
        {
            foreach($palavras as $p)
            {
                $this->listaPalavras[$p]++;
            }
        }
        else
            $this->listaPalavras[$palavras]++;
    }

    /**
     * Obtem um número de acordo com o percentual de aparecimento,
     * a dezena do percentual.
     * Exemplo: se a palavra aparece 72%, o retorno será 7.
     * Se 3%, o retorno é 0.
     *
     * @param double $percentualUso
     * @access private
     */
    function obtemCss($percentualUso)
    {
        if($pecentualUso >= 99)
            $classe = 10;
        else {
            $classe = floor(($percentualUso / 10));
        }

        return $classe;
    }

    /**
     * Mistura as palavras aleatoriamente.
     * @access private
     */
    function misturaPalavras()
    {
        $listaValores            = $this->listaPalavras;
        $palavras                = array_keys($this->listaPalavras);
        $this->listaPalavras    = array();

        shuffle($palavras);

        foreach($palavras as $palavra)
            $this->listaPalavras[$palavra] = $listaValores[$palavra];
    }

    /**
     * Retorna a nuvem de tags, contendo o percentual,
     * a palavra (tag) e a classe CSS.
     */
    function mostraNuvem()
    {
        if(!sizeof($this->listaPalavras))
        {
            trigger_error('Nenhuma palavra adicionada.', E_USER_ERROR);
        }
        elseif(!is_array($this->listaPalavras))
        {
            trigger_error('O membro palavras deve ser um array.', E_USER_ERROR);
        }
        else
        {
            $quantidadePresencas = array_sum($this->listaPalavras);

            $this->misturaPalavras();

            $nuvemTags = array();

            foreach($this->listaPalavras as $palavra => $presenca)
            {
                $aparecimentoPercentual = ((100 * $presenca) / $quantidadePresencas);
                $classeCss = $this->obtemCss($aparecimentoPercentual);

                $nuvemTags[] = array(
                    'palavra'    =>    $palavra,
                    'classe'    =>    $classeCss,
                    'percentual'=>  floor($aparecimentoPercentual)
                );
            }

            return $nuvemTags;
        }
    }
}

?> 