<?php

class Cake
{
    private string $pudding;
    private string $type;
    private string $source;
    private string $date;
    private string $rating;
    private string $comment;

    /**
     * @param string $pudding
     * @param string $type
     * @param string $source
     * @param string $date
     * @param string $rating
     * @param string $comment
     */
    public function __construct(string $pudding, string $type, string $source, string $date, string $rating, string $comment)
    {
        $this->pudding = $pudding;
        $this->type = $type;
        $this->source = $source;
        $this->date = $date;
        $this->rating = $rating;
        $this->comment = $comment;
    }

    public function getPudding(): string
    {
        return $this->pudding;
    }

    public function setPudding(string $pudding): void
    {
        $this->pudding = $pudding;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function setSource(string $source): void
    {
        $this->source = $source;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getRating(): string
    {
        return $this->rating;
    }

    public function setRating(string $rating): void
    {
        $this->rating = $rating;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }
}