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
        $this->setPassword($password, $maxLength);
    }

    /**
     * Set password
     *
     * @param $password
     *
     * @param int $maxLength
     */
    public function setPassword($password, $maxLength = 128)
    {
        $pass = htmlspecialchars(substr($password, 0, $maxLength));
        $this->password = $pass;
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
            $hash = $this->getHash($algorithm, $password);
            $hashes[$algorithm] = $hash;
        }

        return $hashes;
    }

    /**
     * Return hash by defined algorithm
     *
     * @param $algorithm
     * @param $password
     *
     * @return string
     */
    private function getHash($algorithm, $password)
    {
        return hash($algorithm, $password, false);
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

    /**
     * Get SHA-1 helper
     *
     * @param $password
     *
     * @return string
     */
    public function getSha1($password = null)
    {
        if ($password) {
            $this->setPassword($password);
        }

        return $this->getHash('sha1', $password);
    }

    /**
     * Get MD5 hash
     *
     * @param $password
     *
     * @return string
     */
    public function getMd5($password = null)
    {
        if ($password) {
            $this->setPassword($password);
        }

        return $this->getHash('md5', $password);
    }

}
