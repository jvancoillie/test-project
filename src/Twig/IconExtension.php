<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Twig;

use AppBundle\Utils\Markdown;
use Symfony\Component\Intl\Intl;

/**
 * 
 */
class IconExtension extends \Twig_Extension
{
    /**
     * @var string
     */
    private $iconPrefix;

    /**
     * @var string
     */
    private $iconTag;

    /**
     * @param string $iconPrefix
     * @param string $iconTag
     */
    public function __construct($iconPrefix = "fa", $iconTag = 'span')
    {
        $this->iconPrefix = $iconPrefix;
        $this->iconTag = $iconTag;
    }


    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('parse_icons', [$this, 'parseIconsFilter'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('icon', [$this, 'iconFunction'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * Parses the given string and replaces all occurrences of .icon-[name] with the corresponding icon.
     *
     * @param string $text The text to parse
     *
     * @return string The HTML code with the icons
     */
    public function parseIconsFilter($text)
    {
        $that = $this;
        return preg_replace_callback(
            '/\.icon-([a-z0-9+-]+)/',
            function ($matches) use ($that) {
                return $that->iconFunction($matches[1]);
            },
            $text
        );
    }

    /**
     * Returns the HTML code for the given icon.
     *
     * @param string $icon The name of the icon
     *
     * @return string The HTML code for the icon
     */
    public function iconFunction($icon)
    {
        $icon = str_replace('+', ' '.$this->iconPrefix.'-', $icon);
        return sprintf('<%1$s class="%2$s %2$s-%3$s"></%1$s>', $this->iconTag, $this->iconPrefix, $icon);
    }

}
