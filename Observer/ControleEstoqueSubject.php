<?php

namespace Observer;

/**
 * Class ControleEstoqueSubject
 * @package Observer
 */
class ControleEstoqueSubject implements Subject
{
    /** @var Observer[] $observers */
    private $observers;

    /**
     * @param Observer $observer
     * @return bool
     */
    public function adicionarObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * @param Observer $observerRemover
     * @return bool
     */
    public function removerObserver(Observer $observerRemover): bool
    {
        foreach ($this->observers as $index => $observer) {
            if ($observer === $observerRemover) {
                unset($this->observers[$index]);
                return true;
            }
        }

        return false;
    }

    /**
     * @param string $codigoProduto
     * @return bool|void
     */
    public function notificarObservers(string $codigoProduto)
    {
        foreach ($this->observers as $observer) {
            $observer->atualizado($codigoProduto);
        }
    }
}