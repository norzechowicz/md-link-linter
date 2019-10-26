<?php

declare(strict_types=1);

/*
 * This file is part of the Markdown Link Linter library.
 *
 * (c) Norbert Orzechowicz <norbert@orzechowicz.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MDLinkLinter\Tests\Markdown;

use MDLinkLinter\Markdown\Link;
use PHPUnit\Framework\TestCase;

final class LinkTest extends TestCase
{
    public function test_relative_link()
    {
        $link = new Link('test', 'relative_link', new \DOMDocument());

        $this->assertTrue($link->isRelative());
    }

    public function test_mention_link()
    {
        $link = new Link('test', '@norzechowicz', new \DOMDocument());

        $this->assertTrue($link->isMention());
    }

    public function test_anchor_link()
    {
        $link = new Link('test', '#anchor', new \DOMDocument());

        $this->assertTrue($link->isAnchor());
    }

    public function test_url_link()
    {
        $link = new Link('test', 'https://norbert.tech', new \DOMDocument());

        $this->assertTrue($link->isUrl());
    }
}