<?php
namespace AndKirby\ModmanGenerator;

/**
 * Class Generator
 *
 * @package AndKirby\ModmanGenerator
 */
class Generator
{
    /**
     * Set options
     *
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        if (empty($options['vcs'])) {
            $options['vcs'] = new Vcs\Git();
        }
        if (empty($options['fileSystem'])) {
            $options['fileSystem'] = new FileSystem(
                array(
                    'vcs' => $options['vcs']
                )
            );
        }
        $this->_fileSystem = $options['fileSystem'];
    }

    /**
     * Generate
     *
     * @return array
     * @throws \AndKirby\ModmanGenerator\Exception
     */
    public function generate()
    {
        $list = $this->_fileSystem->getMatchedPaths();
        if (!$list) {
            throw new Exception("No files found under GIT to place into 'modman' file.");
        }
        return $list;
    }
}
