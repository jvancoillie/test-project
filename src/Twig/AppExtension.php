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
class AppExtension extends \Twig_Extension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('age', [$this, 'ageFilter'], ['is_safe' => ['html']]),
        ];
    }
    
    /**
     * Parses the given string and replaces all occurrences of .icon-[name] with the corresponding icon.
     *
     * @param string $text The text to parse
     *
     * @return string The HTML code with the icons
     */
    public function ageFilter(\DateTime $date)
    {
        $dateInterval = $date->diff(new \DateTime());

        return $dateInterval->y;
    }


}
