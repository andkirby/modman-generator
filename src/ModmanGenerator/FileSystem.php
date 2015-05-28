<?php
namespace AndKirby\ModmanGenerator;

/**
 * Class FileSystem
 *
 * @package AndKirby\ModmanGenerator
 */
class FileSystem
{
    /**
     * Get VCS adapter
     *
     * @var Vcs\AdapterInterface
     */
    protected $_vcs;

    /**
     * Set options
     *
     * @param array $options
     * @throws \AndKirby\ModmanGenerator\Exception
     */
    public function __construct(array $options = array())
    {
        if (empty($options['vcs'])) {
            throw new Exception('VCS adapter is not set.');
        }
        if (!($options['vcs'] instanceof Vcs\AdapterInterface)) {
            throw new Exception('VCS adapter is not set.');
        }
        $this->_vcs = $options['vcs'];
    }

    /**
     * Get ignores files
     *
     * @return array
     */
    protected function _getIgnoredFiles()
    {
        return $this->_getDefaultIgnoredFiles();
    }

    /**
     * Get default ignore files list
     *
     * @return array
     */
    protected function _getDefaultIgnoredFiles()
    {
        return array(
            'modman',
            'composer\.json',
            'composer\.lock',
            '\.gitignore',
            'README\.md',
            'LICENSE',
        );
    }

    /**
     * Get VSC files
     *
     * @param bool $asPlainText
     * @return array
     */
    public function getVcsFiles($asPlainText = true)
    {
        return $this->_vcs->getFilesInVcs(
            $this->_getIgnoredFiles(),
            $asPlainText
        );
    }

    /**
     * Get matched files directories paths
     *
     * @return array
     */
    public function getMatchedPaths()
    {
        $files = $this->getVcsFiles();
        //match directories
        preg_match_all(
            '~app/code/([A-z_]+/){3}|app/etc/modules/[^\n]*|app/design/([^/\n]+/?){6}|(shell|js|skin)/[^\n]+|lib/[A-z]+/~s',
            $files, $matches
        );
        return array_unique($matches[0]);
    }
}
