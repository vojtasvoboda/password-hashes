<?php

/**
 * Class Hasher
 *
 * @author Vojta Svoboda <vojtasvoboda.cz@gmail.com>
 */
class Hasher
{

    /** @var string $password */
    private $password;

    /**
     * Constructor
     *
     * @param string $password
     * @param int    $maxLength
     */
    public function __construct($password, $maxLength = 128)
    {
        $this->password = $this->cleanPassword($password, $maxLength);
    }

    /**
     * Clean inserted password
     *
     * @param $password
     * @param $maxLength
     *
     * @return string
     */
    private function cleanPassword($password, $maxLength)
    {
        return htmlspecialchars(substr($password, 0, $maxLength));
    }

    /**
     * Returns cleaned password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Return all known hashes
     *
     * @return array
     */
    public function getAllHashes()
    {
        // our cleaned password
        $password = $this->getPassword();

        // available algorithms
        $algorithms = $this->getAvailableAlgorithms();

        // calculate hashes
        $hashes = array();
        foreach($algorithms as $algorithm) {
            $hash = hash($algorithm, $password, false);
            $hashes[] = array('title' => $algorithm, 'hash' => $hash);
        }

        return $hashes;
    }

    /**
     * Returns available hash algorithms
     *
     * @return array
     */
    public function getAvailableAlgorithms()
    {
        return hash_algos();
    }

}
