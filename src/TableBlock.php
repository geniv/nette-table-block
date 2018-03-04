<?php declare(strict_types=1);

use GeneralForm\ITemplatePath;
use Nette\Application\UI\Control;
use Nette\Localization\ITranslator;


/**
 * Class TableBlock
 *
 * @author  geniv
 */
class TableBlock extends Control implements ITemplatePath
{
    /** @var ITranslator|null */
    private $translator;
    /** @var string */
    private $templatePath;
    /** @var array */
    private $variableTemplate = [];


    /**
     * TableBlock constructor.
     *
     * @param ITranslator|null $translator
     */
    public function __construct(ITranslator $translator = null)
    {
        parent::__construct();

        $this->translator = $translator;

        $this->templatePath = __DIR__ . '/TableBlock.latte';    // set path
    }


    /**
     * Set template path.
     *
     * @param string $path
     */
    public function setTemplatePath(string $path)
    {
        $this->templatePath = $path;
    }


    /**
     * Add variable template.
     *
     * @param string $name
     * @param        $values
     * @return TableBlock
     */
    public function addVariableTemplate(string $name, $values): self
    {
        $this->variableTemplate[$name] = $values;
        return $this;
    }


    /**
     * Render.
     */
    public function render()
    {
        $template = $this->getTemplate();

        // add user defined variable
        foreach ($this->variableTemplate as $name => $value) {
            $template->$name = $value;
        }

        $template->setTranslator($this->translator);
        $template->setFile($this->templatePath);
        $template->render();
    }
}
