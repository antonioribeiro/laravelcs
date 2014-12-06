<?php
/**
 * Function Declaration.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Antonio Carlos Ribeiro <acr@antoniocarlosribeiro.com>
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
if (class_exists('PHP_CodeSniffer_Standards_AbstractPatternSniff', true) === false) {
    throw new PHP_CodeSniffer_Exception('Class PHP_CodeSniffer_Standards_AbstractPatternSniff not found');
}

class Laravel_Sniffs_Functions_FunctionDeclarationSniff extends PHP_CodeSniffer_Standards_AbstractPatternSniff
{
    /**
     * Returns an array of patterns to check are correct.
     *
     * @return array
     */
    protected function getPatterns()
    {
        return array(
            'function abc(...);',
            "function abc(...)\n",
            'abstract function abc(...);',
        );
    }//end getPatterns()
}//end class
