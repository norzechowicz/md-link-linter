<?php

declare(strict_types=1);

/*
 * This file is part of the Hire in Social project.
 *
 * (c) Norbert Orzechowicz <norbert@orzechowicz.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MDLinkLinter\Markdown;

final class HtmlConverter
{
    private $parser;

    public function __construct()
    {
        $this->parser = new \Parsedown();
    }

    public function convert(\SplFileObject $markdownFile) : \DOMDocument
    {
        $dom = new \DOMDocument();
        @$dom->loadHTML(\sprintf(
            "<markdown>%s</markdown>",
            $this->parser->parse(\file_get_contents($markdownFile->getPathname()))
        ));

        return $dom;
    }
}