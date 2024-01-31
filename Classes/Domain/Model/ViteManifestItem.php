<?php

declare(strict_types=1);

namespace Praetorius\ViteAssetCollector\Domain\Model;

final class ViteManifestItem
{
    public $identifier;
    public $src;
    public $file;
    public $isEntry;
    public $isDynamicEntry;
    public $assets;
    public $css;
    public $imports;
    public $dynamicImports;

    public function __construct(
        string $identifier,
        ?string $src,
        string $file,
        bool $isEntry,
        bool $isDynamicEntry,
        array $assets,
        array $css,
        array $imports,
        array $dynamicImports
    ) {
        $this->identifier = $identifier;
        $this->src = $src;
        $this->file = $file;
        $this->isEntry = $isEntry;
        $this->isDynamicEntry = $isDynamicEntry;
        $this->assets = $assets;
        $this->css = $css;
        $this->imports = $imports;
        $this->dynamicImports = $dynamicImports;
    }

    public static function fromArray(array $item, string $identifier): ViteManifestItem
    {
        return new static(
            $identifier,
            $item['src'] ?? null,
            $item['file'],
            (bool)($item['isEntry'] ?? false),
            (bool)($item['isDynamicEntry'] ?? false),
            (array)($item['assets'] ?? []),
            (array)($item['css'] ?? []),
            (array)($item['imports'] ?? []),
            (array)($item['dynamicImports'] ?? []),
        );
    }
}
