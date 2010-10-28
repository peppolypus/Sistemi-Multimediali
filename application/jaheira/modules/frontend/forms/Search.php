<?php
class Frontend_Form_Search extends Zend_Form
{
    public function init()
    {
        $immobile = new Zend_Form_Element_Radio('immobile');
        $immobile->addMultiOption('Affitto', 'Affitto')
                ->addMultiOption('Vendita', 'Vendita')
                ->setLabel('Immobile in ')
                ->setRequired(true)
                ->removeDecorator('Errors')
                ->addErrorMessage('Specificare il tipo di Immobile');
        $this->addElement($immobile);

        $tipi = array(
            '0' => '- Seleziona un Tipo - ',
            'Ufficio' => 'Ufficio',
            'Appartamento' => 'Appartamento',
            'Attico' => 'Attico',
            'Attivita\' Commerciale e/o Negozi' => 'Attivita\' Commerciale e/o Negozi',
            'Garage e/o Box' => 'Garage e/o Box',
            'Ville e Villini' => 'Ville e Villini',
            'Casali e/o Antico' => 'Casali e/o Antico',
            'Lotti Edificabili' => 'Lotti Edificabili',
            'Casa Vacanza' => 'Casa Vacanza',
            'Terreni' => 'Terreni'
        );
        $tipo = new Zend_Form_Element_Select('tipo');
        $tipo->setLabel('Tipologia')
                ->addMultiOptions($tipi);
        $this->addElement($tipo);

        $stati = array(
            '0' => '- Seleziona Stato -',
            'Arredato' => 'Arredato',
            'Non Arredato' => 'Non Arredato'
        );
        $stato = new Zend_Form_Element_Select('stato');
        $stato->setLabel('Stato')
                ->addMultiOptions($stati);
        $this->addElement($stato);

        $this->addElement('submit', 'submit', array('label' => 'Inizia Ricerca'));

        $this->setAction('/search/search');

    }
}