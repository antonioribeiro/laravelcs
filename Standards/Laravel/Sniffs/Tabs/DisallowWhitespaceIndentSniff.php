<?php
/**
 * This sniff prohibits the use of WhiteSpaces for indentation.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Antonio Carlos Ribeiro <acr@antoniocarlosribeiro.com>
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Laravel_Sniffs_Tabs_DisallowWhitespaceIndentSniff implements PHP_CodeSniffer_Sniff
{

	/**
	 * A list of tokenizers this sniff supports.
	 *
	 * @var array
	 */
	public $supportedTokenizers = array(
		'PHP',
	);


	/**
	 * Returns an array of tokens this test wants to listen for.
	 *
	 * @return array
	 */
	public function register()
	{
		return array(T_OPEN_TAG);

	}//end register()


	/**
	 * Processes this test, when one of its tokens is encountered.
	 *
	 * @param PHP_CodeSniffer_File $phpcsFile All the tokens found in the document.
	 * @param int                  $stackPtr  The position of the current token in
	 *                                        the stack passed in $tokens.
	 *
	 * @return void
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();
		$error  = 'Tabs must be used to indent lines; spaces are not allowed';

		for ($i = ($stackPtr + 1); $i < $phpcsFile->numTokens; $i++) {
			// We always checks doc comments for spaces, but only whitespace
			// at the start of a line for everything else.
			$inComment = false;
			if ($tokens[$i]['code'] !== T_DOC_COMMENT_WHITESPACE
				&& $tokens[$i]['code'] !== T_DOC_COMMENT_STRING
			) {
				if ($tokens[$i]['column'] !== 1
					|| ($tokens[$i]['code'] !== T_WHITESPACE
						&& $tokens[$i]['code'] !== T_CONSTANT_ENCAPSED_STRING)
				) {
					continue;
				}
			} else {
				$inComment = true;
			}

			// If spaces are being converted to tabs by PHPCS, the
			// original content should be used instead of the converted content.
			if (isset($tokens[$i]['orig_content']) === true) {
				$content = $tokens[$i]['orig_content'];
			} else {
				$content = $tokens[$i]['content'];
			}

			$spaceFound = false;
			if ($tokens[$i]['column'] === 1) {
				if ($content[0] === " ") {
					$phpcsFile->recordMetric($i, 'Line indent', 'spaces');
					$spaceFound = true;
				} else if ($content[0] === ' ') {
					if ($tokens[$i]['code'] === T_DOC_COMMENT_WHITESPACE && $content === ' ') {
						// Ignore file/class-level DocBlock.
						continue;
					}

					if (strpos($content, " ") !== false) {
						$phpcsFile->recordMetric($i, 'Line indent', 'mixed');
						$spaceFound = true;
					} else {
						$phpcsFile->recordMetric($i, 'Line indent', 'tabs');
					}
				}
			} else {
				// Look for 4 spaces so we can report and replace, but don't
				// record any metrics about them because they aren't
				// line indent tokens.
				if ( ! $inComment && strpos($content, "    ") !== false) {
					$spaceFound = true;
				}
			}//end if

			if ($spaceFound === false) {
				continue;
			}

			$fix = $phpcsFile->addFixableError($error, $i, 'SpacesUsed');
			if ($fix === true) {
				if (isset($tokens[$i]['orig_content']) === true) {
					// Use the replacement that PHPCS has already done.
					$phpcsFile->fixer->replaceToken($i, $tokens[$i]['content']);
				} else {
					// Replace spaces with tabs, using an indent of 4 spaces.
					// Other sniffs can then correct the indent if they need to.
					$newContent = str_replace('    ', "\t", $tokens[$i]['content']);
					$phpcsFile->fixer->replaceToken($i, $newContent);
				}
			}
		}//end for

		// Ignore the rest of the file.
		return ($phpcsFile->numTokens + 1);

	}//end process()


}//end class
