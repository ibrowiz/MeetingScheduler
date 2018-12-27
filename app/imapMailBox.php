<?php

class IMAPMailbox implements IteratorAggregate, Countable
{
    private $stream;
    public function __construct($hostname, $username, $password)
    {
        $stream = imap_open($hostname, $username, $password);
        if (FALSE === $stream) {
            throw new Exception('Connect failed: ' . imap_last_error());
        }
        $this->stream = $stream;
    }
    public function getStream()
    {
        return $this->stream;
    }
    /**
     * @return stdClass
     */
    public function check()
    {
        $info = imap_check($this->stream);
        if (FALSE === $info) {
            throw new Exception('Check failed: ' . imap_last_error());
        }
        return $info;
    }
    /**
     * @param string $criteria
     * @param int $options
     * @param int $charset
     * @return IMAPMessage[]
     * @throws Exception
     */
    public function search($criteria, $options = NULL, $charset = NULL)
    {
        $emails = imap_search($this->stream, $criteria, $options, $charset);
        if (FALSE === $emails) {
            throw new Exception('Search failed: ' . imap_last_error());
        }
        foreach ($emails as &$email) {
            $email = $this->getMessageByNumber($email);
        }
        return $emails;
    }
    /**
     * @param int $number
     * @return IMAPMessage
     */
    public function getMessageByNumber($number)
    {
        return new IMAPMessage($this, $number);
    }
    public function getOverview($sequence = NULL)
    {
        if (NULL === $sequence) {
            $sequence = sprintf('1:%d', count($this));
        }
        return new IMAPOverview($this, $sequence);
    }
    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing Iterator or
     * Traversable
     */
    public function getIterator()
    {
        return $this->getOverview()->getIterator();
    }
    /**
     * @return int
     */
    public function count()
    {
        return $this->check()->Nmsgs;
    }
}
?>