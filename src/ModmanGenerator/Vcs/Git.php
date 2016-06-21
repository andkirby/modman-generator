<?php
namespace AndKirby\ModmanGenerator\Vcs;

/**
 * Class Git adapter
 *
 * @package AndKirby\ModmanGenerator\Vcs
 */
class Git implements AdapterInterface
{
    /**
     * Get files list from VCS
     *
     * @param array $ignoreFiles
     * @param bool  $asPlainText
     * @return array
     */
    public function getFilesInVcs(array $ignoreFiles = array(), $asPlainText = false)
    {
        $gitRoot = $this->getRoot() . '/.git';
        $ignoreFiles = implode('|', $ignoreFiles);
        $files = `git --git-dir="$gitRoot" ls-files | grep -vE "($ignoreFiles)"`;
        return $asPlainText ? $files : explode(PHP_EOL, $files);
    }

    /**
     * Get root
     *
     * @return string
     */
    public function getRoot()
    {
        return trim(`git rev-parse --show-toplevel`);
    }
}
