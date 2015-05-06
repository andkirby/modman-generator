<?php
namespace AndKirby\ModmanGenerator\Vcs;

/**
 * Interface VCS AdapterInterface
 *
 * @package AndKirby\ModmanGenerator\Vcs
 */
interface AdapterInterface
{
    /**
     * Get files list from VCS
     *
     * @param array $ignoreFiles
     * @param bool  $asPlainText
     * @return array
     */
    public function getFilesInVcs(array $ignoreFiles = array(), $asPlainText = false);

    /**
     * Get root
     *
     * @return string
     */
    public function getRoot();
}
