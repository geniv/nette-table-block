Table block
===========

Installation
------------
```sh
$ composer require geniv/nette-table-block
```
or
```json
"geniv/nette-table-block": ">=1.0.0"
```

require:
```json
"php": ">=7.0.0",
"nette/nette": ">=2.4.0",
"geniv/nette-general-form": ">=1.0.0"
```

Include in application
----------------------
neon configure:
```neon
services:
    - TableBlock
```

usage:
```php
protected function createComponentStudioBlock(TableBlock $tableBlock): TableBlock
{
    $studioBlock = clone $tableBlock;
    $studioBlock->setTemplatePath(__DIR__ . '/templates/Studio/studioBlock.latte');
    $studioBlock->addVariableTemplate('listStudio', $this->listStudio);
    return $studioBlock;
}
```

usage:
```latte
{control studioBlock}
```

usage in template:
```latte
<div n:foreach="$listStudio as $item">
    <h1>{$item['title']}</h1>
</div>

{if !$iterations}
    no items
{/if}
```
