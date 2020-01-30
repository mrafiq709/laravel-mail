<?php

namespace Packages\Mail\Generator;

use Illuminate\Contracts\Support\Arrayable;

abstract class BaseMailGenerator implements Arrayable {
    protected $from;
    protected $to;
    protected $cc;
    protected $bcc;
    protected $title;
    protected $subject;
    protected $content;
    protected $attachment;

    public function setFrom(string $from): BaseMailGenerator
    {
        $this->from = $from;

        return $this;
    }

    public function setTo(string $to): BaseMailGenerator
    {
        $this->to = $to;

        return $this;
    }

    public function setCc(array $cc): BaseMailGenerator
    {
        $this->cc = $cc;

        return $this;
    }

    public function setBcc(array $bcc): BaseMailGenerator
    {
        $this->bcc = $bcc;

        return $this;
    }

    public function setTitle(string $title): BaseMailGenerator
    {
        $this->title = $title;

        return $this;
    }

    public function setSubject(string $subject): BaseMailGenerator
    {
        $this->subject = $subject;

        return $this;
    }

    public function setContent(string $content): BaseMailGenerator
    {
        $this->content = $content;

        return $this;
    }

    private function getFrom() : string
    {
        return $this->from;
    }

    private function getTo() : string
    {
        return $this->to;
    }

    private function getCc() : ?string
    {
        return $this->cc ? collect($this->cc)->implode(',') : null;
    }

    private function getBcc() : ?string
    {
        return $this->bcc ? collect($this->bcc)->implode(',') : null;
    }

    private function getTitle() : string
    {
        return $this->title;
    }

    private function getSubject() : string
    {
        return $this->subject;
    }

    private function getContent() : string
    {
        return $this->content;
    }

    private function getAttachment() : ?string
    {
        return $this->attachment ? $this->attachment : null;
    }

    public function toArray(): array
    {
        return [
            'from' => $this->getFrom(),
            'to' => $this->getTo(),
            'cc' => $this->getCc(),
            'bcc' => $this->getBcc(),
            'title' => $this->getTitle(),
            'subject' => $this->getSubject(),
            'content' => $this->getContent(),
            'attachment' => $this->getAttachment()
        ];
    }
}
